<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BukuController extends Controller
{
    /**
     * Display a listing of the books
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $books = Buku::with('kategori')
            ->when($search, function ($query, $search) {
                return $query->search($search);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.buku.index', compact('books', 'search'));
    }

    /**
     * Show the form for creating a new book
     */
    public function create()
    {
        $categories = Kategori::orderBy('Nama_Kategori')->get();
        return view('admin.buku.create', compact('categories'));
    }

    /**
     * Store a newly created book in storage
     */
    public function store(Request $request)
    {
        $request->validate([
            'Judul' => 'required|string|max:255',
            'Pengarang' => 'required|string|max:255',
            'id_kategori' => 'required|exists:t_kategori,id_kategori',
            'Sinopsis' => 'required|string',
            'ISBN' => 'required|string|unique:t_buku,ISBN|max:13',
            'Tahun_Terbit' => 'required|integer|min:1900|max:' . date('Y'),
            'Penerbit' => 'required|string|max:255',
            'Stok' => 'required|integer|min:0',
            'Harga' => 'required|numeric|min:0',
            'Cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->only([
            'Judul', 'Pengarang', 'id_kategori', 'Sinopsis', 'ISBN',
            'Tahun_Terbit', 'Penerbit', 'Stok', 'Harga'
        ]);

        // Handle cover image upload
        if ($request->hasFile('Cover')) {
            $cover = $request->file('Cover');
            $filename = time() . '_' . Str::slug($request->Judul) . '.' . $cover->getClientOriginalExtension();
            $coverPath = $cover->storeAs('covers', $filename, 'public');
            $data['Cover'] = $coverPath;
        }

        Buku::create($data);

        return redirect()->route('admin.buku.index')
            ->with('success', 'Buku berhasil ditambahkan!');
    }

    /**
     * Display the specified book
     */
    public function show($id)
    {
        $buku = Buku::where('id_buku', $id)->with('kategori')->firstOrFail();
        return view('admin.buku.show', compact('buku'));
    }

    /**
     * Show the form for editing the specified book
     */
    public function edit($id)
    {
        $buku = Buku::where('id_buku', $id)->firstOrFail();
        $categories = Kategori::orderBy('Nama_Kategori')->get();
        return view('admin.buku.edit', compact('buku', 'categories'));
    }

    /**
     * Update the specified book in storage
     */
    public function update(Request $request, $id)
    {
        $buku = Buku::where('id_buku', $id)->firstOrFail();

        $request->validate([
            'Judul' => 'required|string|max:255',
            'Pengarang' => 'required|string|max:255',
            'id_kategori' => 'required|exists:t_kategori,id_kategori',
            'Sinopsis' => 'required|string',
            'ISBN' => 'required|string|max:13|unique:t_buku,ISBN,' . $buku->id_buku . ',id_buku',
            'Tahun_Terbit' => 'required|integer|min:1900|max:' . date('Y'),
            'Penerbit' => 'required|string|max:255',
            'Stok' => 'required|integer|min:0',
            'Harga' => 'required|numeric|min:0',
            'Cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->only([
            'Judul', 'Pengarang', 'id_kategori', 'Sinopsis', 'ISBN',
            'Tahun_Terbit', 'Penerbit', 'Stok', 'Harga'
        ]);

        // Handle cover image upload
        if ($request->hasFile('Cover')) {
            // Delete old cover if exists
            if ($buku->Cover && Storage::disk('public')->exists($buku->Cover)) {
                Storage::disk('public')->delete($buku->Cover);
            }

            $cover = $request->file('Cover');
            $filename = time() . '_' . Str::slug($request->Judul) . '.' . $cover->getClientOriginalExtension();
            $coverPath = $cover->storeAs('covers', $filename, 'public');
            $data['Cover'] = $coverPath;
        }

        $buku->update($data);

        return redirect()->route('admin.buku.index')
            ->with('success', 'Buku berhasil diperbarui!');
    }

    /**
     * Remove the specified book from storage
     */
    public function destroy($id)
    {
        $buku = Buku::where('id_buku', $id)->firstOrFail();

        // Delete cover image if exists
        if ($buku->Cover && Storage::disk('public')->exists($buku->Cover)) {
            Storage::disk('public')->delete($buku->Cover);
        }

        $buku->delete();

        return redirect()->route('admin.buku.index')
            ->with('success', 'Buku berhasil dihapus!');
    }
}
