<?php

namespace App\Http; // Mendefinisikan namespace untuk kelas ini.

use Illuminate\Foundation\Http\Kernel as HttpKernel; // Mengimpor kelas dasar HttpKernel dari Laravel.

/**
 * Kelas Kernel adalah inti dari pipeline HTTP aplikasi Laravel.
 * Kelas ini mendefinisikan middleware global, grup middleware, dan middleware route
 * yang akan dijalankan pada setiap request yang masuk ke aplikasi.
 */
class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     * THESE Middleware are run during every request to your application.
     *
     * Properti ini berisi daftar middleware yang akan dijalankan pada SETIAP request
     * yang masuk ke aplikasi, terlepas dari route yang diakses.
     * Middleware ini dijalankan sebelum middleware grup atau middleware route.
     *
     * @var array<int, class-string|string>
     */
    protected $middleware = [
        // Middleware untuk menangani proxy tepercaya. Penting jika aplikasi berjalan di belakang load balancer atau proxy.
        \Illuminate\Http\Middleware\TrustProxies::class,
        // Middleware untuk menangani Cross-Origin Resource Sharing (CORS). Mengatur header untuk mengizinkan request dari domain lain.
        \Illuminate\Http\Middleware\HandleCors::class,
        // Middleware untuk mencegah request saat aplikasi dalam mode maintenance.
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
        // Middleware untuk memvalidasi ukuran data POST. Mencegah upload file atau data yang terlalu besar.
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        // Middleware untuk menghapus spasi kosong (whitespace) dari input request.
        \Illuminate\Foundation\Http\Middleware\TrimStrings::class,
        // Middleware untuk mengubah string kosong menjadi null pada input request.
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * Properti ini mendefinisikan grup middleware. Grup ini memungkinkan Anda untuk
     * menerapkan beberapa middleware sekaligus ke sekelompok route dengan mudah.
     * Grup 'web' dan 'api' adalah grup bawaan.
     *
     * @var array<string, array<int, class-string|string>>
     */
    protected $middlewareGroups = [
        'web' => [
            // Grup middleware 'web' biasanya diterapkan ke route yang digunakan untuk antarmuka web.
            // Middleware ini menyediakan fitur-fitur seperti session, CSRF protection, dan error sharing.
            \Illuminate\Cookie\Middleware\EncryptCookies::class, // Mengenkripsi cookie yang dikirim oleh aplikasi.
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class, // Menambahkan cookie yang diantrekan ke respons.
            \Illuminate\Session\Middleware\StartSession::class, // Memulai session untuk request.
            \Illuminate\View\Middleware\ShareErrorsFromSession::class, // Membagikan error dari session ke view.
            \App\Http\Middleware\VerifyCsrfToken::class, // Memverifikasi token CSRF untuk melindungi dari serangan Cross-Site Request Forgery.
            \Illuminate\Routing\Middleware\SubstituteBindings::class, // Mengganti placeholder di route dengan model Eloquent yang sesuai (Route Model Binding).
        ],

        'api' => [
            // Grup middleware 'api' biasanya diterapkan ke route yang digunakan untuk API.
            // Middleware ini seringkali lebih minimalis dibandingkan grup 'web'.
            // \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class, // Middleware bawaan Sanctum (dikomentari di sini).
            // Middleware untuk membatasi jumlah request (rate limiting) ke API. ':api' adalah nama limiter yang digunakan.
            \Illuminate\Routing\Middleware\ThrottleRequests::class.':api',
            // Middleware untuk mengganti placeholder di route dengan model Eloquent yang sesuai (Route Model Binding).
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * The application's route middleware.
     *
     * Properti ini mendefinisikan middleware individual yang dapat diterapkan ke route
     * atau sekelompok route menggunakan alias.
     *
     * These middleware may be assigned to groups or used individually.
     * @var array<string, class-string|string>
     */
    protected $routeMiddleware = [
        // Alias 'auth' merujuk ke middleware Authenticate, digunakan untuk melindungi route yang hanya bisa diakses oleh user yang sudah login.
        'auth' => \App\Http\Middleware\Authenticate::class,
        // Alias 'auth.basic' merujuk ke middleware AuthenticateWithBasicAuth, digunakan untuk otentikasi dasar HTTP.
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        // Alias 'auth.session' merujuk ke middleware AuthenticateSession, digunakan untuk mengelola session otentikasi.
        'auth.session'  => \Illuminate\Session\Middleware\AuthenticateSession::class,
        // Alias 'chace.headers' (typo, seharusnya 'cache.headers') merujuk ke middleware SetCacheHeaders, digunakan untuk mengatur header cache.
        'chace.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        // Alias 'can' merujuk ke middleware Authorize, digunakan untuk memeriksa otorisasi (menggunakan gate atau policy).
        'can'  => \Illuminate\Auth\Middleware\Authorize::class,
        // Alias 'guest' merujuk ke middleware RedirectIfAuthenticated, digunakan untuk mengarahkan user yang sudah login dari halaman tertentu (misal: login, register).
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        // Alias 'password.confirm' merujuk ke middleware RequirePassword, digunakan untuk meminta konfirmasi password sebelum mengakses route sensitif.
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        // Alias 'precognitive' merujuk ke middleware HandlePrecognitiveRequests, digunakan untuk menangani request precognitive (fitur Livewire).
        'precognitive'  => \Illuminate\Foundation\Http\Middleware\HandlePrecognitiveRequests::class,
        // Alias 'signed' merujuk ke middleware ValidateSignature, digunakan untuk memvalidasi URL yang ditandatangani.
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        // Alias 'throttle' merujuk ke middleware ThrottleRequests, digunakan untuk membatasi jumlah request.
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        // Alias 'verified' merujuk ke middleware EnsureEmailIsVerified, digunakan untuk memastikan email user sudah terverifikasi.
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        // Alias 'admin' merujuk ke middleware AdminMiddleware, digunakan untuk melindungi route yang hanya bisa diakses oleh user dengan role admin.
        'admin'  => \App\Http\Middleware\AdminMiddleware::class,
    ];
}
