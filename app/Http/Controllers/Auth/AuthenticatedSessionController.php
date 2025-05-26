<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Tampilkan form login.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Proses login berdasarkan email (admin), nim (mahasiswa), nip (dosen).
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'login' => 'required|string|min:4',
            'password' => 'required|string|min:4',
        ]);

        $user = null;

        // Coba login sebagai admin berdasarkan email
        if ($user = User::where('email', $request->login)->where('role', 'admin')->first()) {
            // user ditemukan
        }
        // Coba login sebagai mahasiswa berdasarkan NIM
        elseif ($mahasiswa = Mahasiswa::where('nim', $request->login)->first()) {
            $user = $mahasiswa->user;
        }
        // Coba login sebagai dosen berdasarkan NIP
        elseif ($dosen = Dosen::where('nip', $request->login)->first()) {
            $user = $dosen->user;
        }

        // Validasi password
        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'login' => 'Login gagal. Periksa kembali login dan password.',
            ]);
        }

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->intended('/redirect');
    }

    /**
     * Logout user dan akhiri sesi.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}