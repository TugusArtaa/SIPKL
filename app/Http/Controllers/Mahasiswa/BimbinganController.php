<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Bimbingan;
use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BimbinganController extends Controller
{
    public function index()
    {
        $mahasiswa = Auth::user()->mahasiswa;
        $bimbingan = Bimbingan::where('mahasiswa_id', $mahasiswa->id)->with('dosen')->latest()->get();
        return view('mahasiswa.bimbingan.index', compact('bimbingan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'dosen_id' => 'required|exists:dosen,id',
            'tanggal_bimbingan' => 'required|date',
            'catatan' => 'required|string'
        ]);

        Bimbingan::create([
            'mahasiswa_id' => Auth::user()->mahasiswa->id,
            'dosen_id' => $request->dosen_id,
            'tanggal_bimbingan' => $request->tanggal_bimbingan,
            'catatan' => $request->catatan,
            'status' => 'pending'
        ]);

        return redirect()->back()->with('success', 'Pengajuan bimbingan berhasil!');
    }
}