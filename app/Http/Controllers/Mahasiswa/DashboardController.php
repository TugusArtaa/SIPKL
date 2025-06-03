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

    public function perusahaan(Request $request)
    {
        $query = Perusahaan::query();
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('nama', 'like', "%$search%")
                ->orWhere('alamat', 'like', "%$search%")
                ->orWhere('no_hp', 'like', "%$search%")
            ;
        }
        $perusahaan = $query->paginate(10)->appends($request->only('search'));
        return view('mahasiswa.perusahaan.index', compact('perusahaan'));
    }
}