<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');

        $users = User::when($search, function ($query, $search) {
                return $query->where('Nama_Lengkap', 'like', '%' . $search . '%')
                    ->orWhere('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10)
            ->withQueryString();

        return view('admin.user', compact('users', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return to index for now; implement form view if needed
        return redirect()->route('admin.user.index')->with('success', 'Fitur tambah pengguna belum diimplementasikan.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return redirect()->route('admin.user.index')->with('success', 'Fitur tambah pengguna belum diimplementasikan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('admin.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'Nama_Lengkap' => 'required|string|max:255',
            'Email' => 'required|email|max:255|unique:t_user,Email,' . $user->id_user . ',id_user',
            'Username' => 'nullable|string|max:100|unique:t_user,Username,' . $user->id_user . ',id_user',
            'NoHp' => 'nullable|string|max:30',
            'Alamat' => 'nullable|string|max:1000',
            'Role' => 'required|string|in:Admin,User',
        ]);

        $user->Nama_Lengkap = $request->Nama_Lengkap;
        $user->Email = $request->Email;
        if ($request->filled('Username')) {
            $user->Username = $request->Username;
        }
        $user->NoHp = $request->NoHp;
        $user->Alamat = $request->Alamat;
        $user->Role = $request->Role;

        // Update password only if provided
        if ($request->filled('Password')) {
            $user->Password = bcrypt($request->Password);
        }

        $user->save();

        return redirect()->route('admin.user.index')->with('success', 'Pengguna berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // Prevent deleting currently authenticated user
    $auth = Auth::user();
        if ($auth && $auth->getAuthIdentifier() == $user->getAuthIdentifier()) {
            return redirect()->route('admin.user.index')->with('error', 'Anda tidak dapat menghapus pengguna yang sedang aktif.');
        }

        $user->delete();

        return redirect()->route('admin.user.index')->with('success', 'Pengguna berhasil dihapus.');
    }
}
