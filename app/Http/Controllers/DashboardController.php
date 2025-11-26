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
    public function userDashboard()
    {
        // Debug authentication
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        $user = Auth::user();
        if (!$user || !$user->isUser()) {
            return redirect('/login')->with('error', 'Access denied. User only.');
        }

        return view('user.dashboard', [
            'user' => $user,
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
