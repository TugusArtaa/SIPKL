<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

// Middleware untuk membatasi akses berdasarkan role user
class RoleMiddleware
{
    /**
     * Handle request dan cek role user.
     * Jika user login dan rolenya sesuai, lanjutkan request.
     * Jika tidak, tampilkan error 403 (Akses ditolak).
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // Cek apakah user sudah login dan rolenya sesuai
        if (Auth::check() && Auth::user()->role === $role) {
            return $next($request); // Lanjutkan ke proses berikutnya
        }

        // Jika tidak sesuai, tolak akses
        abort(403, 'Akses ditolak.');
    }
}