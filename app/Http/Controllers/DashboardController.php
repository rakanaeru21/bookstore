<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Dashboard untuk admin
     */
    public function adminDashboard()
    {
        // Debug authentication
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        $user = Auth::user();
        if (!$user || !$user->isAdmin()) {
            return redirect('/login')->with('error', 'Access denied. Admin only.');
        }

        $totalUsers = User::where('Role', 'User')->count();
        $totalAdmins = User::where('Role', 'Admin')->count();

        return view('admin.dashboard', [
            'user' => $user,
            'totalUsers' => $totalUsers,
            'totalAdmins' => $totalAdmins,
        ]);
    }

    /**
     * Dashboard untuk user biasa
     */
    public function userDashboard(Request $request)
    {
        // Debug authentication
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        $user = Auth::user();
        if (!$user || !$user->isUser()) {
            return redirect('/login')->with('error', 'Access denied. User only.');
        }

        // Get search parameters
        $search = $request->get('search');
        $kategoriFilter = $request->get('kategori');
        $sortBy = $request->get('sort');

        // Base query for books
        $booksQuery = \App\Models\Buku::with('kategori');

        // Apply search filter
        if ($search) {
            $booksQuery->where(function($query) use ($search) {
                $query->where('Judul', 'like', '%' . $search . '%')
                      ->orWhere('Pengarang', 'like', '%' . $search . '%')
                      ->orWhere('ISBN', 'like', '%' . $search . '%')
                      ->orWhere('Penerbit', 'like', '%' . $search . '%');
            });
        }

        // Apply category filter
        if ($kategoriFilter) {
            $booksQuery->where('id_kategori', $kategoriFilter);
        }

        // Apply sorting
        switch ($sortBy) {
            case 'newest':
                $booksQuery->orderBy('created_at', 'desc');
                break;
            case 'oldest':
                $booksQuery->orderBy('created_at', 'asc');
                break;
            case 'price_low':
                $booksQuery->orderBy('Harga', 'asc');
                break;
            case 'price_high':
                $booksQuery->orderBy('Harga', 'desc');
                break;
            case 'title':
                $booksQuery->orderBy('Judul', 'asc');
                break;
            default:
                $booksQuery->orderBy('id_buku', 'desc');
        }

        // Get filtered books
        $filteredBooks = $booksQuery->get();

        // Get all books for stats (unfiltered)
        $allBooks = \App\Models\Buku::with('kategori')->orderBy('id_buku', 'desc')->get();

        // Get all categories with their books
        $categories = \App\Models\Kategori::with(['buku' => function($query) {
            $query->orderBy('id_buku', 'desc');
        }])->get();

        return view('user.dashboard', [
            'user' => $user,
            'books' => $allBooks,
            'filteredBooks' => $filteredBooks,
            'categories' => $categories,
        ]);
    }    /**
     * Redirect berdasarkan role
     */
    public function dashboard()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        if ($user->isAdmin()) {
            return redirect('/admin/dashboard');
        } else {
            return redirect('/user/dashboard');
        }
    }
}
