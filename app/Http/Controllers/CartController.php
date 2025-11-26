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

        $cart = session()->get('cart', []);

        $id = $buku->id_buku;
        if (isset($cart[$id])) {
            $cart[$id]['qty'] += 1;
        } else {
            $cart[$id] = [
                'id_buku' => $id,
                'Judul' => $buku->Judul,
                'Harga' => $buku->Harga,
                'Cover' => $buku->Cover,
                'qty' => 1,
            ];
        }

        session(['cart' => $cart]);

        return Redirect::back()->with('success', 'Buku ditambahkan ke keranjang.');
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
        return view('cart', compact('cart'));
    }
}
