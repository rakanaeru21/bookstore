<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PesananController extends Controller
{
    /**
     * Display a listing of all orders for admin
     */
    public function index()
    {
        $pesanan = DB::table('t_transaksi')
                     ->join('t_user', 't_transaksi.id_user', '=', 't_user.id_user')
                     ->select('t_transaksi.*', 't_user.Nama_Lengkap as nama_customer', 't_user.Email')
                     ->orderBy('t_transaksi.created_at', 'desc')
                     ->paginate(10);

        return view('admin.pesanan.index', compact('pesanan'));
    }

    /**
     * Show the specified order details
     */
    public function show($id)
    {
        $transaksi = DB::table('t_transaksi')
                       ->join('t_user', 't_transaksi.id_user', '=', 't_user.id_user')
                       ->where('t_transaksi.id_transaksi', $id)
                       ->select('t_transaksi.*', 't_user.Nama_Lengkap as nama_customer', 't_user.Email')
                       ->first();

        if (!$transaksi) {
            return redirect()->route('admin.pesanan.index')->with('error', 'Pesanan tidak ditemukan.');
        }

        $details = DB::table('t_detail_transaksi')
                     ->join('t_buku', 't_detail_transaksi.id_buku', '=', 't_buku.id_buku')
                     ->where('t_detail_transaksi.id_transaksi', $id)
                     ->select('t_detail_transaksi.*', 't_buku.Judul', 't_buku.Cover', 't_buku.Harga as harga_satuan')
                     ->get();

        return view('admin.pesanan.show', compact('transaksi', 'details'));
    }

    /**
     * Update payment status specifically (new method for payment proof management)
     */
    public function updatePayment(Request $request, $id)
    {
        $request->validate([
            'status_pembayaran' => 'required|string|in:Menunggu Verifikasi,Berhasil,Gagal',
            'catatan_admin' => 'nullable|string|max:500'
        ]);

        $transaksi = DB::table('t_transaksi')->where('id_transaksi', $id)->first();

        if (!$transaksi) {
            return redirect()->route('admin.pesanan.index')->with('error', 'Pesanan tidak ditemukan.');
        }

        DB::beginTransaction();

        try {
            $updateData = [
                'Status_Pembayaran' => $request->status_pembayaran,
                'catatan_admin' => $request->catatan_admin,
                'updated_at' => Carbon::now()
            ];

            // Update order status based on payment status
            if ($request->status_pembayaran === 'Berhasil') {
                $updateData['Status'] = 'Diproses';
                $message = 'Status pembayaran disetujui. Pesanan diubah menjadi "Diproses".';
            } elseif ($request->status_pembayaran === 'Gagal') {
                $updateData['Status'] = 'Ditolak';

                // Restore stock if payment is rejected
                $details = DB::table('t_detail_transaksi')->where('id_transaksi', $id)->get();
                foreach ($details as $detail) {
                    DB::table('t_buku')
                      ->where('id_buku', $detail->id_buku)
                      ->increment('Stok', $detail->kuantiti);
                }

                $message = 'Pembayaran ditolak. Stok buku telah dikembalikan.';
            } else {
                $message = 'Status pembayaran diperbarui menjadi "Menunggu Verifikasi".';
            }

            DB::table('t_transaksi')
              ->where('id_transaksi', $id)
              ->update($updateData);

            DB::commit();

            return redirect()->route('admin.pesanan.show', $id)->with('success', $message);

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Gagal memperbarui status pembayaran: ' . $e->getMessage());
        }
    }

    /**
     * Update order status (approve/reject payment)
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|in:approve,reject',
            'catatan_admin' => 'nullable|string|max:500'
        ]);

        $transaksi = DB::table('t_transaksi')->where('id_transaksi', $id)->first();

        if (!$transaksi) {
            return redirect()->route('admin.pesanan.index')->with('error', 'Pesanan tidak ditemukan.');
        }

        DB::beginTransaction();

        try {
            if ($request->status === 'approve') {
                // Approve payment
                DB::table('t_transaksi')
                  ->where('id_transaksi', $id)
                  ->update([
                      'Status_Pembayaran' => 'Berhasil',
                      'Status' => 'Diproses',
                      'catatan_admin' => $request->catatan_admin,
                      'updated_at' => Carbon::now()
                  ]);

                $message = 'Pembayaran pesanan berhasil dikonfirmasi. Status pesanan diubah menjadi "Diproses".';
            } else {
                // Reject payment
                DB::table('t_transaksi')
                  ->where('id_transaksi', $id)
                  ->update([
                      'Status_Pembayaran' => 'Gagal',
                      'Status' => 'Ditolak',
                      'catatan_admin' => $request->catatan_admin,
                      'updated_at' => Carbon::now()
                  ]);

                // Restore stock if payment is rejected
                $details = DB::table('t_detail_transaksi')->where('id_transaksi', $id)->get();
                foreach ($details as $detail) {
                    DB::table('t_buku')
                      ->where('id_buku', $detail->id_buku)
                      ->increment('Stok', $detail->kuantiti);
                }

                $message = 'Pembayaran pesanan ditolak. Stok buku telah dikembalikan.';
            }

            DB::commit();

            return redirect()->route('admin.pesanan.show', $id)->with('success', $message);

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Gagal memperbarui status pesanan: ' . $e->getMessage());
        }
    }

    /**
     * Update delivery status
     */
    public function updateDelivery(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|in:dikirim,selesai',
            'nomor_resi' => 'nullable|string|max:100'
        ]);

        $transaksi = DB::table('t_transaksi')->where('id_transaksi', $id)->first();

        if (!$transaksi) {
            return redirect()->route('admin.pesanan.index')->with('error', 'Pesanan tidak ditemukan.');
        }

        try {
            $updateData = [
                'updated_at' => Carbon::now()
            ];

            if ($request->status === 'dikirim') {
                $updateData['Status'] = 'Dikirim';
                $updateData['nomor_resi'] = $request->nomor_resi;
                $message = 'Status pesanan diubah menjadi "Dikirim".';
            } else {
                $updateData['Status'] = 'Selesai';
                $message = 'Pesanan telah diselesaikan.';
            }

            DB::table('t_transaksi')
              ->where('id_transaksi', $id)
              ->update($updateData);

            return redirect()->route('admin.pesanan.show', $id)->with('success', $message);

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui status pengiriman: ' . $e->getMessage());
        }
    }
}
