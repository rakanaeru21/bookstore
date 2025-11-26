<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the categories
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $categories = Kategori::withCount('buku')
            ->when($search, function ($query, $search) {
                return $query->where('Nama_Kategori', 'like', '%' . $search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.kategori.index', compact('categories', 'search'));
    }

    /**
     * Show the form for creating a new category
     */
    public function create()
    {
        return view('admin.kategori.create');
    }

    /**
     * Store a newly created category in storage
     */
    public function store(Request $request)
    {
        $request->validate([
            'Nama_Kategori' => 'required|string|max:255|unique:t_kategori,Nama_Kategori',
        ]);

        Kategori::create([
            'Nama_Kategori' => $request->Nama_Kategori
        ]);

        return redirect()->route('admin.kategori.index')
            ->with('success', 'Kategori berhasil ditambahkan!');
    }

    /**
     * Display the specified category
     */
    public function show($id)
    {
        $kategori = Kategori::where('id_kategori', $id)->withCount('buku')->firstOrFail();
        $books = $kategori->buku()->paginate(10);
        return view('admin.kategori.show', compact('kategori', 'books'));
    }

    /**
     * Show the form for editing the specified category
     */
    public function edit($id)
    {
        $kategori = Kategori::where('id_kategori', $id)->firstOrFail();
        return view('admin.kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified category in storage
     */
    public function update(Request $request, $id)
    {
        $kategori = Kategori::where('id_kategori', $id)->firstOrFail();

        $request->validate([
            'Nama_Kategori' => 'required|string|max:255|unique:t_kategori,Nama_Kategori,' . $kategori->id_kategori . ',id_kategori',
        ]);

        $kategori->update([
            'Nama_Kategori' => $request->Nama_Kategori
        ]);

        return redirect()->route('admin.kategori.index')
            ->with('success', 'Kategori berhasil diperbarui!');
    }

    /**
     * Remove the specified category from storage
     */
    public function destroy($id)
    {
        $kategori = Kategori::where('id_kategori', $id)->firstOrFail();

        // Check if category has books
        if ($kategori->buku()->count() > 0) {
            return redirect()->route('admin.kategori.index')
                ->with('error', 'Tidak dapat menghapus kategori yang masih memiliki buku!');
        }

        $kategori->delete();

        return redirect()->route('admin.kategori.index')
            ->with('success', 'Kategori berhasil dihapus!');
    }
}
