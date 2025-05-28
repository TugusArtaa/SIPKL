<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dosen.dashboard');
    }
    public function mahasiswa()
    {
        return view('dosen.mahasiswa');
    }

    public function bimbingan()
    {
        return view('dosen.bimbingan');
    }

    public function nilai()
    {
        return view('dosen.nilai');
    }
}