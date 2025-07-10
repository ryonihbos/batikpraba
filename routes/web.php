<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\XenditController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BarangController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PesananController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 🏠 Halaman awal
Route::get('/', function () {
    return redirect()->route('login');
});

// 🔐 Autentikasi
Auth::routes();
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// 🏠 Home setelah login
Route::get('/home', [HomeController::class, 'index'])->name('home');

// 🛍️ Pesan Barang
Route::get('pesan/{id}', [PesanController::class, 'index'])->name('pesan.index');
Route::post('pesan/{id}', [PesanController::class, 'pesan'])->name('pesan.store');

// 🔍 Pencarian Produk
Route::get('/cari-produk', [PesanController::class, 'cari'])->name('pesan.cari');

// 🛒 Check Out & Pembayaran
Route::get('check-out', [PesanController::class, 'check_out'])->name('check_out');
Route::delete('check-out/{id}', [PesanController::class, 'delete'])->name('check_out.delete');
Route::get('konfirmasi-check-out', [PesanController::class, 'konfirmasi'])->name('check_out.konfirmasi');

// 💳 Xendit Payment
Route::post('checkout/bayar', [XenditController::class, 'bayar'])->name('checkout.bayar');

// ✅ SUKSES PEMBAYARAN
Route::get('/checkout-sukses/{id}', [XenditController::class, 'sukses'])->name('checkout.sukses');

// 👤 Profile
Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
Route::post('profile', [ProfileController::class, 'update'])->name('profile.update');

// 📜 History Pesanan
Route::get('/history', [HistoryController::class, 'index'])->name('history.index');
Route::get('/history/{id}', [HistoryController::class, 'detail'])->name('history.detail');

// 🔑 Reset Password (custom controller override)
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

// 🛠️ Admin Routes (role-based middleware)
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // Produk
    Route::resource('produk', BarangController::class);
    Route::get('/produk', [BarangController::class, 'index'])->name('admin.barang.index');
    Route::get('/produk/create', [BarangController::class, 'create'])->name('admin.barang.create');
    Route::post('/produk', [BarangController::class, 'store'])->name('admin.barang.store');
    Route::get('/produk/{id}/edit', [BarangController::class, 'edit'])->name('admin.barang.edit');
    Route::put('/produk/{id}', [BarangController::class, 'update'])->name('admin.barang.update');
    Route::delete('/produk/{id}', [BarangController::class, 'destroy'])->name('admin.barang.destroy');

    // Pengguna
    Route::get('pengguna', [UserController::class, 'index'])->name('admin.pengguna');

    // Pesanan
    Route::get('/pesanan', [PesananController::class, 'index'])->name('admin.pesanan.index');
    Route::get('/pesanan/{id}', [PesananController::class, 'show'])->name('admin.pesanan.show'); // ✅ Tambahan penting
});
