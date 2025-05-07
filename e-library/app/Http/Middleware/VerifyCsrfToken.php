<?php

namespace App\Http\Middleware; // Mendefinisikan namespace untuk middleware ini.

use Closure; // Mengimpor class Closure, yang digunakan untuk meneruskan request ke middleware berikutnya atau controller.
use Illuminate\Http\Request; // Mengimpor class Request, merepresentasikan request HTTP yang masuk.
use Symfony\Component\HttpFoundation\Response; // Mengimpor class Response, merepresentasikan respons HTTP yang akan dikirim.

/**
 * Middleware ini bertanggung jawab untuk memverifikasi token CSRF (Cross-Site Request Forgery)
 * pada request yang masuk, terutama untuk metode HTTP yang memodifikasi data (POST, PUT, PATCH, DELETE).
 * Ini adalah middleware keamanan bawaan dari Laravel untuk melindungi aplikasi dari serangan CSRF.
 *
 * Implementasi dasar ini hanya meneruskan request, namun middleware bawaan Laravel
 * yang diperluas dari ini (`Illuminate\Foundation\Http\Middleware\VerifyCsrfToken`)
 * berisi logika sebenarnya untuk memeriksa token.
 */
class VerifyCsrfToken
{
    /**
     * Handle an incoming request.
     *
     * Metode ini dipanggil untuk setiap request yang melewati middleware ini.
     * Dalam implementasi dasar ini, metode ini hanya meneruskan request.
     * Logika verifikasi token CSRF yang sebenarnya ada di parent class
     * yang diperluas oleh middleware ini dalam aplikasi Laravel standar.
     *
     * @param  \Illuminate\Http\Request  $request Objek request yang masuk.
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next Closure untuk meneruskan request.
     * @return \Symfony\Component\HttpFoundation\Response Objek respons.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Meneruskan request ke middleware berikutnya dalam pipeline
        // atau ke controller jika ini adalah middleware terakhir.
        // Dalam implementasi dasar ini, tidak ada logika verifikasi CSRF di sini.
        // Middleware `Illuminate\Foundation\Http\Middleware\VerifyCsrfToken`
        // yang biasanya digunakan di kernel HTTP akan melakukan verifikasi token.
        return $next($request);
    }
}
