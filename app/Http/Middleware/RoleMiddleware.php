<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(
        Request $request,
        Closure $next,
        string $role
    ): Response {

        // 1. PERBAIKAN: Jika user BELUM login, baru arahkan ke login.
        // (Tambahkan tanda seru '!' di depan Auth::check)
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // 2. Cek apakah role user TIDAK sesuai dengan yang diminta
        // Pastikan nama kolom di database tabel users Anda memang 'role'
        if (Auth::user()->role !== $role) {
            abort(403, 'Unauthorized access.');

            // OPSI ALTERNATIF: Daripada abort 403, Anda bisa redirect ke dashboard user biasa:
            // return redirect()->route('dashboard'); 
        }

        // 3. Jika aman, lanjutkan proses
        return $next($request);
    }
}
