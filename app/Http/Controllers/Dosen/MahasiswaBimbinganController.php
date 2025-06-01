<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Bimbingan;
use App\Models\Mahasiswa;

class MahasiswaBimbinganController extends Controller
{
    public function index()
    {
        $dosen = Auth::user()->dosen;

        // Ambil ID mahasiswa bimbingan yang unik
        $mahasiswaIds = Bimbingan::where('dosen_id', $dosen->id)
            ->select('mahasiswa_id')
            ->distinct()
            ->pluck('mahasiswa_id');

        // Ambil data mahasiswa dengan user-nya, lalu paginate
        $mahasiswa = Mahasiswa::with('user')
            ->whereIn('id', $mahasiswaIds)
            ->paginate(10);

        return view('dosen.mahasiswa.index', compact('mahasiswa'));
    }
}