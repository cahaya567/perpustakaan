<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\HomeController;

// Redirect ke halaman login jika belum login
Route::get('/', function () {
    return redirect()->route('login');
})->middleware('guest');

// Dashboard/Home setelah login
Route::get('/home', [App\Http\Controllers\DashboardController::class, 'index'])->name('home')->middleware('auth');

// Routes untuk autentikasi bawaan Laravel
Auth::routes();

// Resource routes dengan middleware auth
Route::middleware('auth')->group(function () {
    Route::resource('buku', BukuController::class);
    Route::resource('pengguna', PenggunaController::class);
    Route::resource('peminjaman', PeminjamanController::class);
});

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
