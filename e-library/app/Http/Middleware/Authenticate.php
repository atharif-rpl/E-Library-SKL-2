<?php

namespace App\Http\Middleware;

use Closure; // Import class Closure
use Illuminate\Http\Request; // Import class Request
use Symfony\Component\HttpFoundation\Response; // Import class Response

/**
 * Middleware ini bertanggung jawab untuk memastikan bahwa user sudah terotentikasi (login).
 * Jika user belum login saat mencoba mengakses route yang dilindungi oleh middleware ini,
 * mereka akan diarahkan ke halaman login.
 */
class Authenticate
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * Metode ini menentukan ke mana user akan diarahkan jika mereka belum login.
     *
     * @param  \Illuminate\Http\Request  $request Objek request yang masuk.
     * @return string|null Path (URL) tujuan redirect, atau null jika tidak perlu redirect.
     */
    protected function redirectTo(Request $request): ?string
    {
        // Memeriksa apakah request mengharapkan respons JSON.
        // $request->expectsJson() akan mengembalikan true jika request memiliki header 'Accept: application/json'.
        // Ini biasanya terjadi pada request API atau AJAX.
        return $request->expectsJson()
                    ? null // Jika request mengharapkan JSON, kembalikan null (tidak perlu redirect, biarkan Laravel mengembalikan respons 401 Unauthorized secara default).
                    : route('login'); // Jika request bukan JSON, arahkan ke named route 'login'.
                                      // route('login') akan menghasilkan URL untuk halaman login.
    }
}
