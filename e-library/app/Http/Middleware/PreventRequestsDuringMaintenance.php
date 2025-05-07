<?php

namespace App\Http\Middleware; // Mendefinisikan namespace untuk middleware ini.

use Closure; // Mengimpor class Closure, yang digunakan untuk meneruskan request ke middleware berikutnya atau controller.
use Illuminate\Http\Request; // Mengimpor class Request, merepresentasikan request HTTP yang masuk.
use Symfony\Component\HttpFoundation\Response; // Mengimpor class Response, merepresentasikan respons HTTP yang akan dikirim.

/**
 * Middleware ini adalah bawaan dari Laravel dan biasanya digunakan dalam mode maintenance.
 * Secara default, middleware ini hanya meneruskan request tanpa melakukan pencegahan.
 * Untuk mengaktifkan mode maintenance, file 'down' perlu dibuat di storage/framework/.
 * Saat mode maintenance aktif, middleware ini akan mengembalikan respons maintenance.
 *
 * @see \Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance
 */
class PreventRequestsDuringMaintenance
{
    /**
     * Handle an incoming request.
     *
     * Metode ini dipanggil untuk setiap request yang melewati middleware ini.
     * Dalam kondisi default (tanpa file 'down'), metode ini hanya meneruskan request.
     * Jika aplikasi dalam mode maintenance (file 'down' ada), Laravel secara otomatis
     * akan menangani respons maintenance sebelum metode handle ini dipanggil,
     * atau middleware bawaan yang diperluas dari ini akan mengembalikan respons maintenance.
     * Kode di sini adalah implementasi dasar yang hanya meneruskan.
     *
     * @param  \Illuminate\Http\Request  $request Objek request yang masuk.
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next Closure untuk meneruskan request.
     * @return \Symfony\Component\HttpFoundation\Response Objek respons.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Meneruskan request ke middleware berikutnya dalam pipeline
        // atau ke controller jika ini adalah middleware terakhir.
        // Dalam implementasi dasar ini, tidak ada logika pencegahan yang ditambahkan di sini.
        // Logika pencegahan mode maintenance biasanya diimplementasikan di middleware
        // yang lebih tinggi dalam tumpukan atau ditangani oleh Laravel secara otomatis
        // ketika file 'down' terdeteksi.
        return $next($request);
    }
}
