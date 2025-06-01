<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Bimbingan;

class MahasiswaBimbinganController extends Controller
{
    public function index()
    {
        $dosen = Auth::user()->dosen;

        $mahasiswa = Bimbingan::with('mahasiswa.user')
            ->where('dosen_id', $dosen->id)
            ->select('mahasiswa_id')
            ->distinct()
            ->get();

        return view('dosen.mahasiswa.index', compact('mahasiswa'));
    }
}