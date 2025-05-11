<?php

namespace App\Http\Middleware; // Pastikan namespace ini BENAR dan sesuai dengan lokasi file

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

/**
 * Middleware untuk memeriksa apakah user memiliki role 'admin'.
 * Middleware ini akan melindungi route yang hanya boleh diakses oleh user dengan role admin.
 */
class AdminMiddleware // Pastikan nama class ini BENAR dan sesuai dengan nama file
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek dulu apakah user sudah login
        if (!Auth::check()) {
            // Jika user belum login, arahkan kembali ke halaman login.
            return redirect()->route('login');
        }

        // Cek role user
        // Pastikan kolom 'role' ada di tabel users dan nilainya string 'admin'
        if (Auth::user()->role === 'admin') {
            // Jika user memiliki role 'admin', lanjutkan request
            return $next($request);
        }

        // Untuk request AJAX/API, return status 403
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json(['message' => 'Anda tidak memiliki akses untuk operasi ini.'], 403);
        }

        // Redirect dengan pesan error untuk request web biasa
        return redirect()->route('books.index')
            ->with('error', 'Anda tidak memiliki akses untuk halaman ini.');
    }
}
