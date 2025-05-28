<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Dosen\DashboardController as DosenDashboardController;
use App\Http\Controllers\Mahasiswa\DashboardController as MahasiswaDashboardController;
use App\Http\Controllers\Admin\ImportMahasiswaController;
use App\Http\Controllers\Admin\ImportDosenController;

// Halaman awal
Route::get('/', function () {
    return redirect('/login');
});

// Dashboard utama setelah login (tidak digunakan karena kita pakai redirect)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

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
    $role = Auth::user()->role;

    return match ($role) {
        'admin' => redirect()->route('admin.dashboard'),
        'dosen' => redirect()->route('dosen.dashboard'),
        'mahasiswa' => redirect()->route('mahasiswa.dashboard'),
        default => abort(403, 'Akses tidak diizinkan'),
    };
})->middleware('auth');

// Admin
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/mahasiswa/import', [ImportMahasiswaController::class, 'create'])->name('mahasiswa.import.form');
    Route::post('/mahasiswa/import', [ImportMahasiswaController::class, 'store'])->name('mahasiswa.import');
    Route::get('/dosen/import', [ImportDosenController::class, 'create'])->name('dosen.import.form');
    Route::post('/dosen/import', [ImportDosenController::class, 'store'])->name('dosen.import');
});

// Dosen
Route::middleware(['auth', 'role:dosen'])->prefix('dosen')->name('dosen.')->group(function () {
    Route::get('/dashboard', [DosenDashboardController::class, 'index'])->name('dashboard');
});

// Mahasiswa
Route::middleware(['auth', 'role:mahasiswa'])->prefix('mahasiswa')->name('mahasiswa.')->group(function () {
    Route::get('/dashboard', [MahasiswaDashboardController::class, 'index'])->name('dashboard');
    Route::get('/pendaftaran', [MahasiswaDashboardController::class, 'pendaftaran'])->name('pendaftaran');
    Route::get('/perusahaan', [MahasiswaDashboardController::class, 'perusahaan'])->name('perusahaan');
    Route::get('/laporan', [MahasiswaDashboardController::class, 'laporan'])->name('laporan');
    Route::get('/bimbingan', [MahasiswaDashboardController::class, 'bimbingan'])->name('bimbingan');
});