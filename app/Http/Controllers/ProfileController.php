<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    /**
     * Show the profile edit form
     */
    public function edit()
    {
        $user = Auth::user();
        return view('user.profile.edit', compact('user'));
    }

    /**
     * Update the user's profile
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'Nama_Lengkap' => 'required|string|max:255',
            'Username' => [
                'required',
                'string',
                'max:255',
                Rule::unique('t_user', 'Username')->ignore($user->id_user, 'id_user'),
            ],
            'Email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('t_user', 'Email')->ignore($user->id_user, 'id_user'),
            ],
            'NoHp' => 'nullable|string|max:20',
            'Alamat' => 'nullable|string|max:500',
        ], [
            'Nama_Lengkap.required' => 'Nama lengkap wajib diisi.',
            'Username.required' => 'Username wajib diisi.',
            'Username.unique' => 'Username sudah digunakan.',
            'Email.required' => 'Email wajib diisi.',
            'Email.email' => 'Format email tidak valid.',
            'Email.unique' => 'Email sudah digunakan.',
        ]);

        $user->update($validated);

        return redirect()->route('profile.edit')->with('success', 'Profil berhasil diperbarui!');
    }

    /**
     * Update the user's password
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ], [
            'current_password.required' => 'Password saat ini wajib diisi.',
            'password.required' => 'Password baru wajib diisi.',
            'password.min' => 'Password minimal 6 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        $user = Auth::user();

        // Check if current password is correct
        if (!Hash::check($request->current_password, $user->Password)) {
            return back()->withErrors(['current_password' => 'Password saat ini tidak sesuai.']);
        }

        $user->update([
            'Password' => Hash::make($request->password),
        ]);

        return redirect()->route('profile.edit')->with('success', 'Password berhasil diperbarui!');
    }
}
