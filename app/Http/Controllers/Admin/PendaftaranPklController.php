<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PendaftaranPkl;
use Illuminate\Http\Request;

class PendaftaranPklController extends Controller
{
    public function index()
    {
        $pendaftaran = PendaftaranPkl::with('mahasiswa.user', 'perusahaan')->latest()->paginate(8);
        return view('admin.pendaftaran.index', compact('pendaftaran'));
    }

    public function verifikasi(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:diterima,ditolak',
        ]);

        $pendaftaran = PendaftaranPkl::findOrFail($id);
        $pendaftaran->status = $request->status;
        $pendaftaran->save();

        return redirect()->route('admin.pendaftaran.index')->with('success', 'Pendaftaran PKl berhasil diverifikasi.');
    }
}