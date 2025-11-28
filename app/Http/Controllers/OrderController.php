<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display list of user orders
     */
    public function index()
    {
        $user = Auth::user();

        $orders = DB::table('t_transaksi')
            ->where('id_user', $user->id_user)
            ->orderBy('created_at', 'desc')
            ->get();

        // Get order details for each order
        foreach ($orders as $order) {
            $order->details = DB::table('t_detail_transaksi')
                ->join('t_buku', 't_detail_transaksi.id_buku', '=', 't_buku.id_buku')
                ->where('t_detail_transaksi.id_transaksi', $order->id_transaksi)
                ->select('t_detail_transaksi.*', 't_buku.Judul', 't_buku.Cover', 't_buku.Pengarang')
                ->get();

            $order->total_items = $order->details->sum('kuantiti');
        }

        return view('user.orders', compact('orders', 'user'));
    }

    /**
     * Display order detail
     */
    public function show($id)
    {
        $user = Auth::user();

        $order = DB::table('t_transaksi')
            ->where('id_transaksi', $id)
            ->where('id_user', $user->id_user)
            ->first();

        if (!$order) {
            return redirect()->route('user.orders')->with('error', 'Pesanan tidak ditemukan.');
        }

        $details = DB::table('t_detail_transaksi')
            ->join('t_buku', 't_detail_transaksi.id_buku', '=', 't_buku.id_buku')
            ->leftJoin('t_kategori', 't_buku.id_kategori', '=', 't_kategori.id_kategori')
            ->where('t_detail_transaksi.id_transaksi', $id)
            ->select('t_detail_transaksi.*', 't_buku.Judul', 't_buku.Cover', 't_buku.Pengarang', 't_buku.Harga as harga_satuan', 't_kategori.Nama_Kategori')
            ->get();

        return view('user.order-detail', compact('order', 'details', 'user'));
    }
}
