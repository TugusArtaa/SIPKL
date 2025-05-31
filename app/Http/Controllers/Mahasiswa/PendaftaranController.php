<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Perusahaan;
use App\Models\PendaftaranPkl;
use Illuminate\Support\Facades\Auth;

class PendaftaranController extends Controller
{
    public function index()
    {
        $mahasiswa = Auth::user()->mahasiswa;
        $pendaftaran = PendaftaranPkl::where('mahasiswa_id', $mahasiswa->id)->first();
        $perusahaan = Perusahaan::all();

        return view('mahasiswa.pendaftaran.index', compact('mahasiswa', 'pendaftaran', 'perusahaan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'perusahaan_id' => 'required|exists:perusahaan,id',
            'bidang_pkl' => 'required|string|max:100',
            'periode' => 'required|string|max:100',
        ]);

        $mahasiswaId = Auth::user()->mahasiswa->id;

        // Cegah pendaftaran ulang
        if (PendaftaranPkl::where('mahasiswa_id', $mahasiswaId)->exists()) {
            return redirect()->back()->with('error', 'Anda sudah mendaftar PKL.');
        }

        PendaftaranPkl::create([
            'mahasiswa_id' => $mahasiswaId,
            'perusahaan_id' => $request->perusahaan_id,
            'bidang_pkl' => $request->bidang_pkl,
            'periode' => $request->periode,
            'status' => 'menunggu',
        ]);

        return redirect()->route('mahasiswa.pendaftaran')->with('success', 'Pendaftaran PKL berhasil.');
    }

    public function destroy($id)
    {
        $pendaftaran = PendaftaranPkl::findOrFail($id);
        // Pastikan hanya mahasiswa yang bersangkutan yang bisa menghapus
        if ($pendaftaran->mahasiswa_id !== Auth::user()->mahasiswa->id) {
            abort(403);
        }
        $pendaftaran->delete();
        return redirect()->route('mahasiswa.pendaftaran')->with('success', 'Anda dapat mengajukan pendaftaran ulang.');
    }
}