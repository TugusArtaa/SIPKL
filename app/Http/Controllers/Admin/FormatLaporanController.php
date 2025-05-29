<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\FormatLaporan;

class FormatLaporanController extends Controller
{
    /**
     * Tampilkan daftar format laporan.
     */
    public function index()
    {
        $format = FormatLaporan::latest()->get();

        return view('admin.format.index', compact('format'));
    }

    /**
     * Upload file format laporan.
     */
    public function upload(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'file' => 'required|mimes:pdf,doc,docx|max:102400',
        ]);

        $path = $request->file('file')->store('format-laporan');

        FormatLaporan::create([
            'nama' => $request->nama,
            'file' => $path,
        ]);

        return redirect()->route('admin.format.index')->with('success', 'Format laporan berhasil diupload.');
    }

    /**
     * Hapus format laporan.
     */
    public function destroy($id)
    {
        $format = FormatLaporan::findOrFail($id);

        Storage::delete($format->file);

        $format->delete();

        return redirect()->route('admin.format.index')->with('success', 'Format laporan berhasil dihapus.');
    }
}