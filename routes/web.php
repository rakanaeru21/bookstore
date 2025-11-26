<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;

// Public routes
Route::get('/', function () {
    return view('welcome');
});

// Authentication routes (guest only)
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Dashboard routes (protected by authentication)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    // Admin routes
    Route::middleware(['role:Admin'])->group(function () {
        Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');

        // Book management routes
        Route::get('/admin/buku', [BukuController::class, 'index'])->name('admin.buku.index');
        Route::get('/admin/buku/create', [BukuController::class, 'create'])->name('admin.buku.create');
        Route::post('/admin/buku', [BukuController::class, 'store'])->name('admin.buku.store');
        Route::get('/admin/buku/{buku}', [BukuController::class, 'show'])->name('admin.buku.show');
        Route::get('/admin/buku/{buku}/edit', [BukuController::class, 'edit'])->name('admin.buku.edit');
        Route::put('/admin/buku/{buku}', [BukuController::class, 'update'])->name('admin.buku.update');
        Route::delete('/admin/buku/{buku}', [BukuController::class, 'destroy'])->name('admin.buku.destroy');

        // Category management routes
        Route::get('/admin/kategori', [KategoriController::class, 'index'])->name('admin.kategori.index');
        Route::get('/admin/kategori/create', [KategoriController::class, 'create'])->name('admin.kategori.create');
        Route::post('/admin/kategori', [KategoriController::class, 'store'])->name('admin.kategori.store');
        Route::get('/admin/kategori/{kategori}', [KategoriController::class, 'show'])->name('admin.kategori.show');
        Route::get('/admin/kategori/{kategori}/edit', [KategoriController::class, 'edit'])->name('admin.kategori.edit');
        Route::put('/admin/kategori/{kategori}', [KategoriController::class, 'update'])->name('admin.kategori.update');
        Route::delete('/admin/kategori/{kategori}', [KategoriController::class, 'destroy'])->name('admin.kategori.destroy');
    });

    // User routes
    Route::middleware(['role:User'])->group(function () {
        Route::get('/user/dashboard', [DashboardController::class, 'userDashboard'])->name('user.dashboard');
    });
});
