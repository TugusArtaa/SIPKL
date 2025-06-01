<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bimbingan;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BimbinganPklController extends Controller
{
    // Menampilkan daftar bimbingan PKL untuk dosen
    public function index()
    {
        // Mengambil data dosen yang sedang login
        $dosen = Auth::user()->dosen;
        // Mengambil tanggal hari ini
        $today = Carbon::today();

        // Mengambil bimbingan yang sudah disetujui dan tanggal bimbingan >= hari ini sampai 7 hari ke depan
        $endDate = $today->copy()->addDays(7);
        $terverifikasi = Bimbingan::with('mahasiswa.user')
            ->where('dosen_id', $dosen->id)
            ->whereIn('status', ['disetujui'])
            ->whereBetween('tanggal_bimbingan', [$today, $endDate])
            ->orderBy('tanggal_bimbingan', 'asc')
            ->get();

        // Mengambil bimbingan yang masih pending
        $pending = Bimbingan::with('mahasiswa.user')
            ->where('dosen_id', $dosen->id)
            ->where('status', 'pending')
            ->orderBy('tanggal_bimbingan', 'asc')
            ->get();

        // Mengirim data ke view
        return view('dosen.bimbingan.index', compact('terverifikasi', 'pending'));
    }

    // Memverifikasi permintaan bimbingan (setujui/tolak)
    public function verifikasi(Request $request, $id)
    {
        // Validasi input status dan catatan
        $request->validate([
            'status' => 'required|in:disetujui,ditolak',
            'catatan' => 'required|string|max:1000',
        ]);

        // Mengambil data bimbingan berdasarkan id
        $bimbingan = Bimbingan::findOrFail($id);
        // Update status dan catatan bimbingan
        $bimbingan->update([
            'status' => $request->status,
            'catatan' => $request->catatan,
        ]);

        // Kembali ke halaman sebelumnya dengan pesan sukses
        return back()->with('success', 'Permintaan bimbingan berhasil diperbarui.');
    }
}