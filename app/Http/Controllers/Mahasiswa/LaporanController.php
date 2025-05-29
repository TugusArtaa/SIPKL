<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LaporanPkl;
use App\Models\Perusahaan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LaporanController extends Controller
{
    public function index()
    {
        $mahasiswa = Auth::user()->mahasiswa;
        $laporan = LaporanPkl::where('mahasiswa_id', $mahasiswa->id)->latest()->first();
        $perusahaan = Perusahaan::all();

        return view('mahasiswa.laporan.index', compact('laporan', 'perusahaan'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf,doc,docx|max:102400',
            'perusahaan_id' => 'required|exists:perusahaan,id'
        ]);

        $mahasiswa = Auth::user()->mahasiswa;
        $laporan = LaporanPkl::where('mahasiswa_id', $mahasiswa->id)->latest()->first();

        // Hanya boleh upload jika belum pernah upload atau status ditolak
        if ($laporan && $laporan->status !== 'ditolak') {
            return redirect()->back()->with('error', 'Laporan tidak dapat diupload ulang kecuali statusnya ditolak.');
        }

        // Hapus file lama jika ada
        if ($laporan && $laporan->file && Storage::exists($laporan->file)) {
            Storage::delete($laporan->file);
        }

        $filePath = $request->file('file')->store('laporan_pkl', 'public');

        // Buat ulang atau perbarui laporan
        if ($laporan) {
            $laporan->update([
                'file' => $filePath,
                'perusahaan_id' => $request->perusahaan_id,
                'status' => 'pending'
            ]);
        } else {
            LaporanPkl::create([
                'mahasiswa_id' => $mahasiswa->id,
                'perusahaan_id' => $request->perusahaan_id,
                'file' => $filePath,
            ]);
        }

        return redirect()->route('mahasiswa.laporan')->with('success', 'Laporan berhasil diupload!');
    }

}