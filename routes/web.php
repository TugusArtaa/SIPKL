<?php

// Import berbagai class dan controller yang dibutuhkan
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
use App\Http\Controllers\Admin\PendaftaranPklController;

// Dosen
use App\Http\Controllers\Dosen\DashboardController as DosenDashboardController;
use App\Http\Controllers\Dosen\BimbinganPKLController;
use App\Http\Controllers\Dosen\MahasiswaBimbinganController;
use App\Http\Controllers\Dosen\NilaiController;

// Mahasiswa
use App\Http\Controllers\Mahasiswa\DashboardController as MahasiswaDashboardController;
use App\Http\Controllers\Mahasiswa\LaporanController as MahasiswaLaporanController;
use App\Http\Controllers\Mahasiswa\PendaftaranController;
use App\Http\Controllers\Mahasiswa\BimbinganController;

// =======================
// Halaman awal
// =======================
// Redirect ke halaman login jika mengakses root
Route::get('/', fn() => redirect('/login'));

// Redirect setelah login berdasarkan role user
Route::get('/redirect', function () {
    $role = Auth::user()->role;
    return match ($role) {
        'admin' => redirect()->route('admin.dashboard'),
        'dosen' => redirect()->route('dosen.dashboard'),
        'mahasiswa' => redirect()->route('mahasiswa.dashboard'),
        default => abort(403, 'Akses tidak diizinkan'),
    };
})->middleware('auth');

// Breeze Auth (route bawaan autentikasi Laravel Breeze)
require __DIR__ . '/auth.php';

// =======================
// Profil
// =======================
// Route untuk edit, update, dan hapus profil user (hanya jika sudah login)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// =======================
// Admin
// =======================
// Semua route admin hanya bisa diakses oleh user dengan role admin
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard admin
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // CRUD Mahasiswa (tambah manual & import)
    Route::get('/mahasiswa', [AdminMahasiswaController::class, 'index'])->name('mahasiswa.index');
    Route::get('/mahasiswa/create', [AdminMahasiswaController::class, 'create'])->name('mahasiswa.create');
    Route::post('/mahasiswa', [AdminMahasiswaController::class, 'store'])->name('mahasiswa.store');
    Route::get('/mahasiswa/import', [ImportMahasiswaController::class, 'create'])->name('mahasiswa.import.form');
    Route::post('/mahasiswa/import', [ImportMahasiswaController::class, 'store'])->name('mahasiswa.import');
    Route::delete('/mahasiswa/{id}', [AdminMahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');
    Route::get('/mahasiswa/{mahasiswa}/edit', [AdminMahasiswaController::class, 'edit'])->name('mahasiswa.edit');
    Route::put('/mahasiswa/{mahasiswa}', [AdminMahasiswaController::class, 'update'])->name('mahasiswa.update');

    // CRUD Dosen (tambah manual & import)
    Route::get('/dosen', [AdminDosenController::class, 'index'])->name('dosen.index');
    Route::get('/dosen/create', [AdminDosenController::class, 'create'])->name('dosen.create');
    Route::post('/dosen', [AdminDosenController::class, 'store'])->name('dosen.store');
    Route::get('/dosen/import', [ImportDosenController::class, 'create'])->name('dosen.import.form');
    Route::post('/dosen/import', [ImportDosenController::class, 'store'])->name('dosen.import');
    Route::delete('/dosen/{id}', [AdminDosenController::class, 'destroy'])->name('dosen.destroy');
    Route::get('/dosen/{dosen}/edit', [AdminDosenController::class, 'edit'])->name('dosen.edit');
    Route::put('/dosen/{dosen}', [AdminDosenController::class, 'update'])->name('dosen.update');

    // CRUD Perusahaan (tanpa show)
    Route::resource('perusahaan', PerusahaanController::class)->except('show');

    // Verifikasi Pendaftaran PKL
    Route::get('/pendaftaran', [PendaftaranPklController::class, 'index'])->name('pendaftaran.index');
    Route::post('/pendaftaran/{id}/verifikasi', [PendaftaranPklController::class, 'verifikasi'])->name('pendaftaran.verifikasi');

    // Verifikasi Laporan PKL
    Route::get('/laporan/verifikasi', [DosenLaporanController::class, 'index'])->name('laporan.verifikasi');
    Route::post('/laporan/verifikasi/{id}', [DosenLaporanController::class, 'verifikasi'])->name('laporan.verifikasi.process');

    // Upload & hapus format laporan
    Route::get('/format-laporan', [FormatLaporanController::class, 'index'])->name('format.index');
    Route::post('/format-laporan', [FormatLaporanController::class, 'upload'])->name('format.upload');
    Route::delete('/format-laporan/{id}', [FormatLaporanController::class, 'destroy'])->name('format.destroy');
});

// =======================
// Dosen
// =======================
// Semua route dosen hanya bisa diakses oleh user dengan role dosen
Route::middleware(['auth', 'role:dosen'])->prefix('dosen')->name('dosen.')->group(function () {
    // Dashboard dosen
    Route::get('/home', [DosenDashboardController::class, 'index'])->name('dashboard');
    // Daftar mahasiswa bimbingan
    Route::get('/mahasiswa-bimbingan', [MahasiswaBimbinganController::class, 'index'])->name('mahasiswa.bimbingan');
    // Jadwal bimbingan PKL
    Route::get('/jadwal-bimbingan', [BimbinganPklController::class, 'index'])->name('bimbingan');
    Route::post('/jadwal-bimbingan/{id}/verifikasi', [BimbinganPklController::class, 'verifikasi'])->name('bimbingan.verifikasi');
    // Input nilai PKL
    Route::get('/input-nilai', [NilaiController::class, 'index'])->name('nilai');
    Route::post('/input-nilai', [NilaiController::class, 'store'])->name('nilai.store');
});

// =======================
// Mahasiswa
// =======================
// Semua route mahasiswa hanya bisa diakses oleh user dengan role mahasiswa
Route::middleware(['auth', 'role:mahasiswa'])->prefix('mahasiswa')->name('mahasiswa.')->group(function () {
    // Dashboard mahasiswa
    Route::get('/home', [MahasiswaDashboardController::class, 'index'])->name('dashboard');
    // Pendaftaran PKL
    Route::get('/pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran');
    Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.store');
    Route::delete('/pendaftaran/{id}', [PendaftaranController::class, 'destroy'])->name('pendaftaran.destroy');
    // Lihat daftar perusahaan
    Route::get('/perusahaan', [MahasiswaDashboardController::class, 'perusahaan'])->name('perusahaan');
    // Laporan PKL
    Route::get('/laporan', [MahasiswaLaporanController::class, 'index'])->name('laporan');
    Route::post('/laporan/upload', [MahasiswaLaporanController::class, 'upload'])->name('laporan.upload');
    // Bimbingan PKL
    Route::get('/bimbingan', [BimbinganController::class, 'index'])->name('bimbingan');
    Route::post('/bimbingan', [BimbinganController::class, 'store'])->name('bimbingan.store');
    // Download format laporan
    Route::get('/format-laporan', function () {
        $format = \App\Models\FormatLaporan::latest()->get();
        return view('mahasiswa.format.index', compact('format'));
    })->name('format');
});