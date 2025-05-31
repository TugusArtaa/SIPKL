<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;

// Admin
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ImportMahasiswaController;
use App\Http\Controllers\Admin\ImportDosenController;
use App\Http\Controllers\Admin\AdminMahasiswaController;
use App\Http\Controllers\Admin\AdminDosenController;
use App\Http\Controllers\Admin\PerusahaanController;
use App\Http\Controllers\Admin\LaporanController as DosenLaporanController;
use App\Http\Controllers\Admin\FormatLaporanController;

// Dosen
use App\Http\Controllers\Dosen\DashboardController as DosenDashboardController;

// Mahasiswa
use App\Http\Controllers\Mahasiswa\DashboardController as MahasiswaDashboardController;
use App\Http\Controllers\Mahasiswa\LaporanController as MahasiswaLaporanController;
use App\Http\Controllers\Mahasiswa\PendaftaranController;

// =======================
// Halaman awal
// =======================
Route::get('/', fn() => redirect('/login'));

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

// Breeze Auth
require __DIR__ . '/auth.php';

// =======================
// Profil
// =======================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// =======================
// Admin
// =======================
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Mahasiswa (tambah manual & import)
    Route::get('/mahasiswa', [AdminMahasiswaController::class, 'index'])->name('mahasiswa.index');
    Route::get('/mahasiswa/create', [AdminMahasiswaController::class, 'create'])->name('mahasiswa.create');
    Route::post('/mahasiswa', [AdminMahasiswaController::class, 'store'])->name('mahasiswa.store');
    Route::get('/mahasiswa/import', [ImportMahasiswaController::class, 'create'])->name('mahasiswa.import.form');
    Route::post('/mahasiswa/import', [ImportMahasiswaController::class, 'store'])->name('mahasiswa.import');
    Route::delete('/mahasiswa/{id}', [AdminMahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');

    // Dosen (tambah manual & import)
    Route::get('/dosen', [AdminDosenController::class, 'index'])->name('dosen.index');
    Route::get('/dosen/create', [AdminDosenController::class, 'create'])->name('dosen.create');
    Route::post('/dosen', [AdminDosenController::class, 'store'])->name('dosen.store');
    Route::get('/dosen/import', [ImportDosenController::class, 'create'])->name('dosen.import.form');
    Route::post('/dosen/import', [ImportDosenController::class, 'store'])->name('dosen.import');
    Route::delete('/dosen/{id}', [AdminDosenController::class, 'destroy'])->name('dosen.destroy');

    // CRUD Perusahaan
    Route::resource('perusahaan', PerusahaanController::class)->except('show');

    // Verifikasi Laporan PKL
    Route::get('/laporan/verifikasi', [DosenLaporanController::class, 'index'])->name('laporan.verifikasi');
    Route::post('/laporan/verifikasi/{id}', [DosenLaporanController::class, 'verifikasi'])->name('laporan.verifikasi.process');

    // Upload Format Laporan
    Route::get('/format-laporan', [FormatLaporanController::class, 'index'])->name('format.index');
    Route::post('/format-laporan', [FormatLaporanController::class, 'upload'])->name('format.upload');
    Route::delete('/format-laporan/{id}', [FormatLaporanController::class, 'destroy'])->name('format.destroy');
});

// =======================
// Dosen
// =======================
Route::middleware(['auth', 'role:dosen'])->prefix('dosen')->name('dosen.')->group(function () {
    Route::get('/dashboard', [DosenDashboardController::class, 'index'])->name('dashboard');
    Route::get('/mahasiswa-bimbingan', [DosenDashboardController::class, 'mahasiswa'])->name('mahasiswa');
    Route::get('/jadwal-bimbingan', [DosenDashboardController::class, 'bimbingan'])->name('bimbingan');
    Route::get('/input-nilai', [DosenDashboardController::class, 'nilai'])->name('nilai');
});

// =======================
// Mahasiswa
// =======================
Route::middleware(['auth', 'role:mahasiswa'])->prefix('mahasiswa')->name('mahasiswa.')->group(function () {
    Route::get('/dashboard', [MahasiswaDashboardController::class, 'index'])->name('dashboard');
    Route::get('/pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran');
    Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.store');
    Route::get('/perusahaan', [MahasiswaDashboardController::class, 'perusahaan'])->name('perusahaan');
    Route::get('/laporan', [MahasiswaLaporanController::class, 'index'])->name('laporan');
    Route::post('/laporan/upload', [MahasiswaLaporanController::class, 'upload'])->name('laporan.upload');
    Route::get('/bimbingan', [MahasiswaDashboardController::class, 'bimbingan'])->name('bimbingan');
    Route::get('/format-laporan', function () {
        $format = \App\Models\FormatLaporan::latest()->get();
        return view('mahasiswa.format.index', compact('format'));
    })->name('format');
});