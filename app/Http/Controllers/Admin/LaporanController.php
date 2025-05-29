<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LaporanPkl;

class LaporanController extends Controller
{
    /**
     * Tampilkan daftar laporan PKL mahasiswa.
     */
    public function index()
    {
        $laporan = LaporanPkl::with(['mahasiswa.user'])->latest()->paginate(8);

        return view('admin.laporan.index', compact('laporan'));
    }

    /**
     * Proses verifikasi laporan PKL.
     */
    public function verifikasi(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:diterima,ditolak',
        ]);

        $laporan = LaporanPkl::findOrFail($id);
        $laporan->status = $request->status;
        $laporan->save();

        return redirect()->route('admin.laporan.verifikasi')->with('success', 'Laporan berhasil diverifikasi.');
    }
}