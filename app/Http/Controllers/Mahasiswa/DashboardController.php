<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Perusahaan;

class DashboardController extends Controller
{
    public function index()
    {
        return view('mahasiswa.dashboard');
    }

    public function perusahaan()
    {
        $perusahaan = Perusahaan::paginate(10);
        return view('mahasiswa.perusahaan.index', compact('perusahaan'));
    }
}