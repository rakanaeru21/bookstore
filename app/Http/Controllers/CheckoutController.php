<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Buku;
use Carbon\Carbon;

class CheckoutController extends Controller
{
    /**
     * Show checkout page
     */
    public function show()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.show')->with('error', 'Keranjang kosong. Silakan tambahkan buku terlebih dahulu.');
        }

        // Calculate totals
        $totalItems = 0;
        $totalPrice = 0;
        foreach ($cart as $item) {
            $totalItems += $item['qty'];
            $totalPrice += $item['Harga'] * $item['qty'];
        }

        return view('user.checkout', compact('cart', 'totalItems', 'totalPrice'));
    }

    /**
     * Process checkout
     */
    public function process(Request $request)
    {
        $request->validate([
            'alamat_pengiriman' => 'required|string|max:500',
            'nomor_telepon' => 'required|string|max:20',
            'ekspedisi' => 'required|string|in:reguler,instant',
            'metode_pembayaran' => 'required|string|in:transfer,cod',
            'catatan' => 'nullable|string|max:255'
        ]);

        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.show')->with('error', 'Keranjang kosong.');
        }

        $user = Auth::user();

        DB::beginTransaction();

        try {
            // Calculate totals
            $totalItems = 0;
            $totalPrice = 0;
            foreach ($cart as $item) {
                $totalItems += $item['qty'];
                $totalPrice += $item['Harga'] * $item['qty'];
            }

            // Calculate shipping cost
            $shippingCost = 0;
            if ($request->ekspedisi === 'reguler') {
                $shippingCost = 8000;
            } elseif ($request->ekspedisi === 'instant') {
                $shippingCost = 20000;
            }

            // Add shipping to total
            $totalPrice += $shippingCost;

            // Check stock availability and update
            foreach ($cart as $item) {
                $buku = Buku::find($item['id_buku']);
                if (!$buku) {
                    throw new \Exception("Buku '{$item['Judul']}' tidak ditemukan.");
                }

                if ($buku->Stok < $item['qty']) {
                    throw new \Exception("Stok buku '{$buku->Judul}' tidak mencukupi. Stok tersisa: {$buku->Stok}");
                }
            }

            // Create transaction
            $transaksi = DB::table('t_transaksi')->insertGetId([
                'id_user' => $user->id_user,
                'Tanggal_Transaksi' => Carbon::now(),
                'Total_harga' => $totalPrice,
                'Ekspedisi' => ucfirst($request->ekspedisi) . ' (Rp ' . number_format($shippingCost, 0, ',', '.') . ')',
                'Status_Pembayaran' => 'Menunggu',
                'Status' => 'Pending',
                'alamat_pengiriman' => $request->alamat_pengiriman,
                'nomor_telepon' => $request->nomor_telepon,
                'metode_pembayaran' => $request->metode_pembayaran,
                'catatan' => $request->catatan,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            // Create transaction details and update stock
            foreach ($cart as $item) {
                $buku = Buku::find($item['id_buku']);

                // Insert detail transaksi
                DB::table('t_detail_transaksi')->insert([
                    'id_transaksi' => $transaksi,
                    'id_user_customer' => $user->id_user,
                    'id_buku' => $item['id_buku'],
                    'kuantiti' => $item['qty'],
                    'harga' => $item['Harga'] * $item['qty'], // Total harga untuk item ini
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);

                // Update stock
                $buku->Stok -= $item['qty'];
                $buku->save();
            }

            // Clear cart
            session()->forget('cart');

            DB::commit();

            return redirect()->route('payment.qris', ['id' => $transaksi])
                           ->with('success', 'Pesanan berhasil dibuat! Silakan lanjutkan pembayaran.');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()
                           ->withInput()
                           ->with('error', 'Gagal memproses pesanan: ' . $e->getMessage());
        }
    }

    /**
     * Show QRIS payment page
     */
    public function paymentQris($id)
    {
        $transaksi = DB::table('t_transaksi')
                       ->join('t_user', 't_transaksi.id_user', '=', 't_user.id_user')
                       ->where('t_transaksi.id_transaksi', $id)
                       ->where('t_transaksi.id_user', Auth::user()->id_user)
                       ->select('t_transaksi.*', 't_user.Nama_Lengkap as Nama_User')
                       ->first();

        if (!$transaksi) {
            return redirect()->route('user.dashboard')->with('error', 'Transaksi tidak ditemukan.');
        }

        $details = DB::table('t_detail_transaksi')
                     ->join('t_buku', 't_detail_transaksi.id_buku', '=', 't_buku.id_buku')
                     ->where('t_detail_transaksi.id_transaksi', $id)
                     ->select('t_detail_transaksi.*', 't_buku.Judul', 't_buku.Cover', 't_buku.Harga as harga_satuan')
                     ->get();

        return view('user.payment-qris', compact('transaksi', 'details'));
    }

    /**
     * Show upload bukti pembayaran page
     */
    public function uploadBukti($id)
    {
        $transaksi = DB::table('t_transaksi')
                       ->join('t_user', 't_transaksi.id_user', '=', 't_user.id_user')
                       ->where('t_transaksi.id_transaksi', $id)
                       ->where('t_transaksi.id_user', Auth::user()->id_user)
                       ->select('t_transaksi.*', 't_user.Nama_Lengkap as Nama_User')
                       ->first();

        if (!$transaksi) {
            return redirect()->route('user.dashboard')->with('error', 'Transaksi tidak ditemukan.');
        }

        return view('user.upload-bukti', compact('transaksi'));
    }

    /**
     * Process upload bukti pembayaran
     */
    public function processUploadBukti(Request $request, $id)
    {
        $request->validate([
            'bukti_pembayaran' => 'required|image|mimes:jpeg,jpg,png|max:2048', // Max 2MB
        ]);

        $transaksi = DB::table('t_transaksi')
                       ->where('id_transaksi', $id)
                       ->where('id_user', Auth::user()->id_user)
                       ->first();

        if (!$transaksi) {
            return redirect()->route('user.dashboard')->with('error', 'Transaksi tidak ditemukan.');
        }

        DB::beginTransaction();

        try {
            // Handle file upload
            if ($request->hasFile('bukti_pembayaran')) {
                $file = $request->file('bukti_pembayaran');

                // Generate unique filename
                $filename = 'bukti_' . $id . '_' . time() . '.' . $file->getClientOriginalExtension();

                // Store file in storage/app/public/bukti_pembayaran
                $path = $file->storeAs('bukti_pembayaran', $filename, 'public');

                // Update transaksi with bukti pembayaran path
                DB::table('t_transaksi')
                  ->where('id_transaksi', $id)
                  ->update([
                      'Bukti_Pembayaran' => $path,
                      'Status_Pembayaran' => 'Menunggu Verifikasi',
                      'Status' => 'Menunggu Konfirmasi',
                      'updated_at' => Carbon::now()
                  ]);

                DB::commit();

                return redirect()->route('checkout.success', ['id' => $id])
                               ->with('success', 'Bukti pembayaran berhasil diupload! Pesanan Anda sedang menunggu konfirmasi admin.');
            }
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()
                           ->with('error', 'Gagal mengupload bukti pembayaran: ' . $e->getMessage());
        }

        return redirect()->back()->with('error', 'File tidak ditemukan.');
    }

    /**
     * Show success page
     */
    public function success($id)
    {
        $transaksi = DB::table('t_transaksi')
                       ->join('t_user', 't_transaksi.id_user', '=', 't_user.id_user')
                       ->where('t_transaksi.id_transaksi', $id)
                       ->where('t_transaksi.id_user', Auth::user()->id_user)
                       ->select('t_transaksi.*', 't_user.Nama_Lengkap as Nama_User')
                       ->first();

        if (!$transaksi) {
            return redirect()->route('user.dashboard')->with('error', 'Transaksi tidak ditemukan.');
        }

        $details = DB::table('t_detail_transaksi')
                     ->join('t_buku', 't_detail_transaksi.id_buku', '=', 't_buku.id_buku')
                     ->where('t_detail_transaksi.id_transaksi', $id)
                     ->select('t_detail_transaksi.*', 't_buku.Judul', 't_buku.Cover', 't_buku.Harga as harga_satuan')
                     ->get();

        return view('user.checkout-success', compact('transaksi', 'details'));
    }
}
