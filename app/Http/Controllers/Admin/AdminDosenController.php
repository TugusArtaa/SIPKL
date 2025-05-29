<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Dosen;
use Illuminate\Support\Facades\Hash;

class AdminDosenController extends Controller
{
    /**
     * Tampilkan semua dosen.
     */
    public function index()
    {
        $dosen = Dosen::with('user')->latest()->get();

        return view('admin.dosen.index', compact('dosen'));
    }

    /**
     * Tampilkan form tambah dosen manual.
     */
    public function create()
    {
        return view('admin.dosen.create');
    }

    /**
     * Simpan data dosen baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|unique:dosens,nip',
            'email' => 'required|email|unique:users,email',
        ]);

        // Buat akun user
        $user = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->nip),
            'role' => 'dosen',
        ]);

        // Buat data dosen
        Dosen::create([
            'user_id' => $user->id,
            'nama' => $request->nama,
            'nip' => $request->nip,
        ]);

        return redirect()->route('admin.dosen.index')->with('success', 'Dosen berhasil ditambahkan.');
    }
}