<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;

// Public routes
use App\Models\Buku;

Route::get('/', function () {
    // Get latest 8 books to show on the public welcome page
    $books = Buku::with('kategori')->orderBy('id_buku', 'desc')->take(8)->get();
    return view('welcome', compact('books'));
});

// Simple cart routes (session-based) - require authentication
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

Route::middleware(['auth'])->group(function () {
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/buy-now', [CartController::class, 'buyNow'])->name('cart.buyNow');
    Route::get('/cart', [CartController::class, 'show'])->name('cart.show');
    Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
    Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

    // Checkout routes
    Route::get('/checkout', [CheckoutController::class, 'show'])->name('checkout.show');
    Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
    Route::get('/payment/qris/{id}', [CheckoutController::class, 'paymentQris'])->name('payment.qris');
    Route::get('/payment/upload/{id}', [CheckoutController::class, 'uploadBukti'])->name('payment.upload');
    Route::post('/payment/upload/{id}', [CheckoutController::class, 'processUploadBukti'])->name('payment.process-upload');
    Route::get('/checkout/success/{id}', [CheckoutController::class, 'success'])->name('checkout.success');
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

        // Orders management routes
        Route::get('/admin/pesanan', [App\Http\Controllers\PesananController::class, 'index'])->name('admin.pesanan.index');
        Route::get('/admin/pesanan/{id}', [App\Http\Controllers\PesananController::class, 'show'])->name('admin.pesanan.show');
        Route::put('/admin/pesanan/{id}/status', [App\Http\Controllers\PesananController::class, 'updateStatus'])->name('admin.pesanan.update-status');
        Route::put('/admin/pesanan/{id}/payment', [App\Http\Controllers\PesananController::class, 'updatePayment'])->name('admin.pesanan.update-payment');
        Route::put('/admin/pesanan/{id}/delivery', [App\Http\Controllers\PesananController::class, 'updateDelivery'])->name('admin.pesanan.update-delivery');

    // User management routes (admin)
    Route::get('/admin/user', [App\Http\Controllers\UserController::class, 'index'])->name('admin.user.index');
    Route::get('/admin/user/create', [App\Http\Controllers\UserController::class, 'create'])->name('admin.user.create');
    Route::post('/admin/user', [App\Http\Controllers\UserController::class, 'store'])->name('admin.user.store');
    Route::get('/admin/user/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('admin.user.show');
    Route::get('/admin/user/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('admin.user.edit');
    Route::put('/admin/user/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('admin.user.update');
    Route::delete('/admin/user/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('admin.user.destroy');
    });

    // User routes
    Route::middleware(['role:User'])->group(function () {
        Route::get('/user/dashboard', [DashboardController::class, 'userDashboard'])->name('user.dashboard');
    });
});
