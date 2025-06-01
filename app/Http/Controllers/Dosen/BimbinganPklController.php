<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bimbingan;
use Illuminate\Support\Facades\Auth;

class BimbinganPklController extends Controller
{
    public function index()
    {
        $dosen = Auth::user()->dosen;
        $bimbingan = Bimbingan::with('mahasiswa.user')
            ->where('dosen_id', $dosen->id)
            ->latest()
            ->get();

        return view('dosen.bimbingan.index', compact('bimbingan'));
    }

    public function verifikasi(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:disetujui,ditolak',
            'catatan' => 'nullable|string',
        ]);

        $bimbingan = Bimbingan::findOrFail($id);
        $bimbingan->update([
            'status' => $request->status,
            'catatan' => $request->catatan,
        ]);

        return back()->with('success', 'Permintaan bimbingan berhasil diperbarui.');
    }
}