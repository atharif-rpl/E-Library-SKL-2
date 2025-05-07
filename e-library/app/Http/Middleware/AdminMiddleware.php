<?php

namespace App\Http\Middleware; // Mendefinisikan namespace untuk middleware ini.

use Closure; // Mengimpor class Closure, yang digunakan untuk meneruskan request ke middleware berikutnya atau controller.
use Illuminate\Http\Request; // Mengimpor class Request, merepresentasikan request HTTP yang masuk.
use Illuminate\Support\Facades\Auth; // Mengimpor Facade Auth untuk otentikasi user.
use Symfony\Component\HttpFoundation\Response; // Mengimpor class Response, merepresentasikan respons HTTP.

/**
 * Middleware untuk memeriksa apakah user yang sedang login memiliki role 'admin'.
 * Middleware ini digunakan untuk melindungi rute atau grup rute agar hanya bisa diakses
 * oleh user dengan hak akses admin.
 */
class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * Metode ini akan dijalankan untuk setiap request yang melewati middleware ini.
     * Ini adalah inti dari logika middleware.
     *
     * @param  \Illuminate\Http\Request  $request Objek request HTTP yang masuk.
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next Closure untuk meneruskan request ke middleware berikutnya atau ke controller.
     * @return \Symfony\Component\HttpFoundation\Response Objek response HTTP.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Langkah 1: Cek apakah user sudah terotentikasi (login).
        // Auth::check() mengembalikan true jika ada user yang sedang login.
        if (!Auth::check()) {
            // Jika user belum login, arahkan mereka ke halaman login.
            // route('login') menghasilkan URL untuk named route 'login'.
            return redirect()->route('login');
        }

        // Langkah 2: Cek role user yang sedang login.
        // Auth::user() mengembalikan instance model User yang sedang login.
        // Kita mengakses properti 'role' dari model tersebut.
        // Membandingkan nilai role dengan string 'admin'.
        if (Auth::user()->role === 'admin') {
            // Jika role user adalah 'admin', request diizinkan untuk dilanjutkan
            // ke middleware berikutnya dalam pipeline atau ke controller tujuan.
            return $next($request);
        }

        // Langkah 3: Jika user tidak memiliki role 'admin', berikan respons yang sesuai.

        // Untuk request AJAX atau request yang mengharapkan respons JSON,
        // kembalikan respons dengan status 403 Forbidden.
        // $request->ajax() memeriksa apakah request dibuat via AJAX.
        // $request->wantsJson() memeriksa apakah request mengharapkan respons JSON (misal via header Accept).
        if ($request->ajax() || $request->wantsJson()) {
            // response()->json(...) membuat respons JSON.
            // ['message' => 'Anda tidak memiliki akses untuk operasi ini.'] adalah body respons.
            // 403 adalah kode status HTTP untuk Forbidden.
            return response()->json(['message' => 'Anda tidak memiliki akses untuk operasi ini.'], 403);
        }

        // Untuk request web biasa (bukan AJAX/JSON), arahkan user ke halaman lain
        // (misalnya halaman daftar buku) dan sertakan pesan error menggunakan flash session.
        // redirect()->route('books.index') mengarahkan ke named route 'books.index'.
        // ->with('error', ...) menambahkan data ke flash session yang hanya tersedia
        // untuk satu request berikutnya, biasanya untuk ditampilkan di view.
        return redirect()->route('books.index')
            ->with('error', 'Anda tidak memiliki akses untuk halaman ini.');
    }
}
