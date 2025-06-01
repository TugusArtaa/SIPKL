<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Bimbingan;
use App\Models\NilaiPkl;
use Illuminate\Support\Facades\Auth;

class NilaiController extends Controller
{
    public function index()
    {
        $dosenId = Auth::user()->dosen->id;

        $mahasiswa = Mahasiswa::whereHas('bimbingan', function ($query) use ($dosenId) {
            $query->where('dosen_id', $dosenId)
                ->where('status', 'disetujui');
        })
            ->withCount([
                'bimbingan as bimbingan_disetujui' => function ($query) use ($dosenId) {
                    $query->where('dosen_id', $dosenId)->where('status', 'disetujui');
                }
            ])
            ->with([
                'nilaiPkl' => function ($q) use ($dosenId) {
                    $q->where('dosen_id', $dosenId);
                }
            ])
            ->get()
            ->filter(fn($m) => $m->bimbingan_disetujui >= 4);

        return view('dosen.nilai.index', compact('mahasiswa'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mahasiswa_id' => 'required|exists:mahasiswa,id',
            'nilai' => 'required|numeric|min:0|max:100',
        ]);

        $dosenId = Auth::user()->dosen->id;

        NilaiPkl::updateOrCreate(
            [
                'mahasiswa_id' => $request->mahasiswa_id,
                'dosen_id' => $dosenId,
            ],
            [
                'nilai' => $request->nilai,
            ]
        );

        return redirect()->route('dosen.nilai')->with('success', 'Nilai berhasil diinputkan.');
    }
}