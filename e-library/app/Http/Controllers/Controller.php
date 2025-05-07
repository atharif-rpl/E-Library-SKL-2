<?php

namespace App\Http\Controllers; // Mendefinisikan namespace untuk base controller ini.

use Illuminate\Foundation\Auth\Access\AuthorizesRequests; // Mengimpor trait AuthorizesRequests untuk otorisasi.
use Illuminate\Foundation\Bus\DispatchesJobs; // Mengimpor trait DispatchesJobs untuk pengiriman job.
use Illuminate\Foundation\Validation\ValidatesRequests; // Mengimpor trait ValidatesRequests untuk validasi request.
use Illuminate\Routing\Controller as BaseController; // Mengimpor kelas dasar Controller dari Laravel dan memberinya alias BaseController.

/**
 * Kelas Controller adalah kelas dasar untuk semua controller di aplikasi Anda.
 * Controller lain akan memperluas kelas ini untuk mewarisi fungsionalitas umum
 * seperti otorisasi, pengiriman job, dan validasi request.
 */
class Controller extends BaseController
{
    /**
     * Menggunakan trait AuthorizesRequests.
     * Trait ini menyediakan metode seperti `authorize()` untuk memeriksa apakah user
     * memiliki izin untuk melakukan tindakan tertentu (menggunakan gate atau policy).
     */
    use AuthorizesRequests;

    /**
     * Menggunakan trait DispatchesJobs.
     * Trait ini menyediakan metode seperti `dispatch()` untuk mengirimkan job
     * ke antrean (queue) atau menjalankannya secara sinkron.
     */
    use DispatchesJobs;

    /**
     * Menggunakan trait ValidatesRequests.
     * Trait ini menyediakan metode seperti `validate()` yang memudahkan validasi
     * data request masuk menggunakan berbagai aturan validasi.
     */
    use ValidatesRequests;

    // Controller dasar ini biasanya kosong atau hanya berisi trait.
    // Logika spesifik untuk menangani request HTTP ditempatkan di controller
    // yang memperluas kelas ini (misalnya, BooksController, AuthController, dll.).
}
