<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Mahasiswa;
use App\Models\Bimbingan;

class DashboardController extends Controller
{
    public function index()
    {
        $dosen = Auth::user()->dosen;

        // Ambil total mahasiswa bimbingan
        $totalMahasiswa = Bimbingan::where('dosen_id', $dosen->id)
            ->distinct('mahasiswa_id')
            ->count('mahasiswa_id');


        // Jumlah bimbingan disetujui
        $bimbinganDisetujui = Bimbingan::where('dosen_id', $dosen->id)->where('status', 'disetujui')->count();

        // Jumlah bimbingan menunggu verifikasi
        $bimbinganPending = Bimbingan::where('dosen_id', $dosen->id)->where('status', 'pending')->count();

        return view('dosen.dashboard', compact('totalMahasiswa', 'bimbinganDisetujui', 'bimbinganPending'));
    }
}