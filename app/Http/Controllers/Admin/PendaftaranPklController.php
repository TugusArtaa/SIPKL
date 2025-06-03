<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PendaftaranPkl;
use Illuminate\Http\Request;

class PendaftaranPklController extends Controller
{
    public function index(Request $request)
    {
        $query = PendaftaranPkl::with('mahasiswa.user', 'perusahaan');
        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereHas('mahasiswa', function ($q) use ($search) {
                $q->where('nama', 'like', "%$search%")
                    ->orWhere('nim', 'like', "%$search%")
                    ->orWhere('program_studi', 'like', "%$search%")
                    ->orWhere('kelas', 'like', "%$search%")
                    ->orWhere('semester', 'like', "%$search%")
                ;
            })
                ->orWhereHas('perusahaan', function ($q) use ($search) {
                    $q->where('nama', 'like', "%$search%")
                    ;
                })
                ->orWhere('bidang_pkl', 'like', "%$search%")
                ->orWhere('status', 'like', "%$search%")
            ;
        }
        $pendaftaran = $query->latest()->paginate(8)->appends($request->only('search'));
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