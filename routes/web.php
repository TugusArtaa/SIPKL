<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;

// Halaman awal
Route::get('/', function () {
    return view('welcome');
});

// Dashboard utama setelah login (tidak digunakan karena kita pakai redirect)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Group route untuk profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route auth (dari Laravel Breeze)
require __DIR__ . '/auth.php';

// Redirect setelah login berdasarkan role
Route::get('/redirect', function () {
    $role = auth()->user()->role;

    return match ($role) {
        'admin' => redirect()->route('admin.dashboard'),
        'dosen' => redirect()->route('dosen.dashboard'),
        'mahasiswa' => redirect()->route('mahasiswa.dashboard'),
        default => abort(403, 'Akses tidak diizinkan'),
    };
})->middleware('auth');

// Route untuk Admin
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
});

// Route untuk Dosen
Route::middleware(['auth', 'role:dosen'])->prefix('dosen')->name('dosen.')->group(function () {
    Route::get('/dashboard', [DosenController::class, 'dashboard'])->name('dashboard');
});

// Route untuk Mahasiswa
Route::middleware(['auth', 'role:mahasiswa'])->prefix('mahasiswa')->name('mahasiswa.')->group(function () {
    Route::get('/dashboard', [MahasiswaController::class, 'dashboard'])->name('dashboard');
});