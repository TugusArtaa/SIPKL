<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Perusahaan;
use App\Models\LaporanPkl;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMahasiswa = Mahasiswa::count();
        $totalDosen = Dosen::count();
        $totalPerusahaan = Perusahaan::count();
        $totalLaporan = LaporanPkl::count();
        $laporanPending = LaporanPkl::where('status', 'pending')->count();
        $laporanDiterima = LaporanPkl::where('status', 'diterima')->count();
        $laporanDitolak = LaporanPkl::where('status', 'ditolak')->count();

        return view('admin.dashboard', compact(
            'totalMahasiswa',
            'totalDosen',
            'totalPerusahaan',
            'totalLaporan',
            'laporanPending',
            'laporanDiterima',
            'laporanDitolak'
        ));
    }
}