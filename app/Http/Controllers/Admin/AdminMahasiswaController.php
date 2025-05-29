<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Hash;

class AdminMahasiswaController extends Controller
{
    /**
     * Tampilkan daftar semua mahasiswa.
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::with('user')->latest()->paginate(8);

        return view('admin.mahasiswa.index', compact('mahasiswa'));
    }

    /**
     * Tampilkan form tambah mahasiswa manual.
     */
    public function create()
    {
        return view('admin.mahasiswa.create');
    }

    /**
     * Simpan data mahasiswa baru (manual).
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|unique:mahasiswa,nim',
            'program_studi' => 'required|string',
            'kelas' => 'required|string',
            'semester' => 'required|integer|min:1',
            'email' => 'required|email|unique:users,email',
        ]);

        // Buat akun user
        $user = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->nim),
            'role' => 'mahasiswa',
        ]);

        // Buat entri mahasiswa
        Mahasiswa::create([
            'user_id' => $user->id,
            'nama' => $request->nama,
            'nim' => $request->nim,
            'program_studi' => $request->program_studi,
            'kelas' => $request->kelas,
            'semester' => $request->semester,
        ]);

        return redirect()->route('admin.mahasiswa.index')->with('success', 'Mahasiswa berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        // Hapus user terkait jika ada
        if ($mahasiswa->user_id) {
            $user = User::find($mahasiswa->user_id);
            if ($user) {
                $user->delete();
            }
        }

        $mahasiswa->delete();

        return redirect()->route('admin.mahasiswa.index')->with('success', 'Mahasiswa berhasil dihapus.');
    }
}