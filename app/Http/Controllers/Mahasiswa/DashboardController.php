<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('mahasiswa.dashboard');
    }
    public function pendaftaran()
    {
        return view('mahasiswa.pendaftaran');
    }

    public function perusahaan()
    {
        return view('mahasiswa.perusahaan');
    }

    public function laporan()
    {
        return view('mahasiswa.laporan');
    }

    public function bimbingan()
    {
        return view('mahasiswa.bimbingan');
    }

}