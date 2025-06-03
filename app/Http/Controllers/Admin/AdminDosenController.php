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
    public function index(Request $request)
    {
        $query = Dosen::with('user');
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%$search%")
                    ->orWhere('nip', 'like', "%$search%")
                    ->orWhere('program_studi', 'like', "%$search%")
                ;
            });
        }
        $dosen = $query->latest()->paginate(8)->appends($request->only('search'));

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
            'nip' => 'required|string|unique:dosen,nip',
            'email' => 'required|email|unique:users,email',
            'program_studi' => 'required|string|max:255',
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
            'program_studi' => $request->program_studi,
        ]);

        return redirect()->route('admin.dosen.index')->with('success', 'Dosen berhasil ditambahkan.');
    }

    /**
     * Tampilkan form edit dosen.
     */
    public function edit($id)
    {
        $dosen = Dosen::findOrFail($id);
        return view('admin.dosen.edit', compact('dosen'));
    }

    /**
     * Update data dosen.
     */
    public function update(Request $request, $id)
    {
        $dosen = Dosen::findOrFail($id);
        $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|unique:dosen,nip,' . $dosen->id,
            'program_studi' => 'required|string|max:255',
        ]);
        $dosen->update([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'program_studi' => $request->program_studi,
        ]);
        // Jika ingin update nama user juga
        if ($dosen->user_id) {
            $dosen->user->update(['name' => $request->nama]);
        }
        return redirect()->route('admin.dosen.index')->with('success', 'Data dosen berhasil diperbarui.');
    }

    /**
     * Hapus data dosen.
     */
    public function destroy($id)
    {
        $dosen = Dosen::findOrFail($id);

        if ($dosen->user_id) {
            User::where('id', $dosen->user_id)->delete();
        }

        $dosen->delete();

        return redirect()->route('admin.dosen.index')->with('success', 'Dosen berhasil dihapus.');
    }
}