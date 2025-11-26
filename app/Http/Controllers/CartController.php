<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Buku;

class CartController extends Controller
{
    /**
     * Add a book to session cart
     */
    public function add(Request $request)
    {
        $request->validate([
            'book_id' => 'required|integer'
        ]);

        $buku = Buku::find($request->input('book_id'));
        if (!$buku) {
            return Redirect::back()->with('error', 'Buku tidak ditemukan.');
        }

        // Cek stok
        if ($buku->Stok <= 0) {
            return Redirect::back()->with('error', "Maaf, buku '{$buku->Judul}' sedang habis stok.");
        }

        $cart = session()->get('cart', []);
        $id = $buku->id_buku;

        // Cek jika sudah ada di keranjang
        if (isset($cart[$id])) {
            $newQty = $cart[$id]['qty'] + 1;

            // Validasi stok
            if ($newQty > $buku->Stok) {
                return Redirect::back()->with('error', "Maaf, stok buku '{$buku->Judul}' hanya tersedia {$buku->Stok} item. Anda sudah menambahkan {$cart[$id]['qty']} item ke keranjang.");
            }

            $cart[$id]['qty'] = $newQty;
            $message = "Jumlah buku '{$buku->Judul}' dalam keranjang berhasil ditambah menjadi {$newQty}.";
        } else {
            $cart[$id] = [
                'id_buku' => $id,
                'Judul' => $buku->Judul,
                'Harga' => $buku->Harga,
                'Cover' => $buku->Cover,
                'Stok' => $buku->Stok, // Simpan info stok untuk validasi di cart
                'qty' => 1,
            ];
            $message = "Buku '{$buku->Judul}' berhasil ditambahkan ke keranjang.";
        }

        session(['cart' => $cart]);
        return Redirect::back()->with('success', $message);
    }

    /**
     * Add to cart then redirect to cart (buy now)
     */
    public function buyNow(Request $request)
    {
        // reuse add logic
        $this->add($request);
        return redirect()->route('cart.show');
    }

    /**
     * Show simple cart page (session)
     */
    public function show()
    {
        $cart = session()->get('cart', []);
        return view('user.cart', compact('cart'));
    }

    /**
     * Remove item from cart
     */
    public function remove(Request $request)
    {
        $request->validate([
            'book_id' => 'required|integer'
        ]);

        $cart = session()->get('cart', []);
        $bookId = $request->input('book_id');

        if (isset($cart[$bookId])) {
            unset($cart[$bookId]);
            session(['cart' => $cart]);
            return Redirect::back()->with('success', 'Buku berhasil dihapus dari keranjang.');
        }

        return Redirect::back()->with('error', 'Buku tidak ditemukan di keranjang.');
    }

    /**
     * Update quantity of item in cart
     */
    public function update(Request $request)
    {
        $request->validate([
            'book_id' => 'required|integer',
            'qty' => 'required|integer|min:1|max:99'
        ]);

        $cart = session()->get('cart', []);
        $bookId = $request->input('book_id');
        $qty = $request->input('qty');

        if (isset($cart[$bookId])) {
            // Ambil info buku terkini untuk validasi stok
            $buku = Buku::find($bookId);
            if (!$buku) {
                return Redirect::back()->with('error', 'Buku tidak ditemukan.');
            }

            // Validasi stok
            if ($qty > $buku->Stok) {
                return Redirect::back()->with('error', "Maaf, stok buku '{$buku->Judul}' hanya tersedia {$buku->Stok} item.");
            }

            $cart[$bookId]['qty'] = $qty;
            $cart[$bookId]['Stok'] = $buku->Stok; // Update info stok
            session(['cart' => $cart]);
            return Redirect::back()->with('success', "Jumlah buku '{$buku->Judul}' berhasil diperbarui menjadi {$qty}.");
        }

        return Redirect::back()->with('error', 'Buku tidak ditemukan di keranjang.');
    }

    /**
     * Clear all items from cart
     */
    public function clear()
    {
        session()->forget('cart');
        return Redirect::back()->with('success', 'Keranjang berhasil dikosongkan.');
    }
}
