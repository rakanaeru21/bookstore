<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Show the registration form
     */
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    /**
     * Handle registration
     */
    public function register(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:t_user,Username',
            'email' => 'required|string|email|max:255|unique:t_user,Email',
            'no_hp' => 'required|string|max:15',
            'alamat' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'Nama_Lengkap' => $request->nama_lengkap,
            'Username' => $request->username,
            'Email' => $request->email,
            'NoHp' => $request->no_hp,
            'Alamat' => $request->alamat,
            'Password' => Hash::make($request->password),
            'Role' => 'User', // Default role untuk registrasi
        ]);

        // Login user setelah registrasi
        Auth::login($user);

        return redirect('/user/dashboard')
            ->with('success', 'Registrasi berhasil! Selamat datang, ' . $user->Nama_Lengkap . '!');
    }

    /**
     * Show the login form
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle login
     */
    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        // Cek apakah login menggunakan email atau username
        $loginType = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'Email' : 'Username';

        // Cari user berdasarkan login type
        $user = User::where($loginType, $request->login)->first();

        // Validasi user dan password
        if (!$user) {
            return redirect()->back()
                ->withErrors(['login' => 'Username/Email tidak ditemukan.'])
                ->withInput();
        }

        if (!Hash::check($request->password, $user->Password)) {
            return redirect()->back()
                ->withErrors(['login' => 'Password salah.'])
                ->withInput();
        }

        // Manual login menggunakan Laravel Auth
        Auth::login($user, $request->filled('remember'));

        // Regenerate session untuk security
        $request->session()->regenerate();

        // Cek apakah login berhasil
        if (!Auth::check()) {
            return redirect()->back()
                ->withErrors(['login' => 'Gagal melakukan login. Silakan coba lagi.'])
                ->withInput();
        }

        // Redirect berdasarkan role
        $successMessage = 'Selamat datang, ' . $user->Nama_Lengkap . '!';

        if ($user->isAdmin()) {
            return redirect('/admin/dashboard')->with('success', $successMessage);
        } else {
            return redirect('/user/dashboard')->with('success', $successMessage);
        }
    }

    /**
     * Handle logout
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
