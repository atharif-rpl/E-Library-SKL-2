<?php

namespace App\Http\Middleware; // Mendefinisikan namespace untuk middleware ini.

// use App\Providers\RouteServiceProvider; // Mengimpor RouteServiceProvider (meskipun tidak secara langsung digunakan di sini, seringkali terkait dengan redirect setelah login/logout).
use Closure; // Mengimpor class Closure, yang digunakan untuk meneruskan request ke middleware berikutnya atau controller.
use Illuminate\Http\Request; // Mengimpor class Request, merepresentasikan request HTTP yang masuk.
use Illuminate\Support\Facades\Auth; // Mengimpor Facade Auth untuk otentikasi.
use Symfony\Component\HttpFoundation\Response; // Mengimpor class Response, merepresentasikan respons HTTP yang akan dikirim.

/**
 * Middleware ini bertanggung jawab untuk mengarahkan user yang sudah terotentikasi (login)
 * agar tidak bisa mengakses halaman-halaman tertentu (misalnya, halaman login atau register).
 * Jika user sudah login, mereka akan diarahkan ke halaman dashboard atau halaman lain yang ditentukan.
 */
class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * Metode ini dipanggil untuk setiap request yang melewati middleware ini.
     * Ini akan memeriksa apakah user sudah login menggunakan guard tertentu.
     *
     * @param  \Illuminate\Http\Request  $request Objek request yang masuk.
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next Closure untuk meneruskan request.
     * @param  string|null  ...$guards Guard(s) yang akan diperiksa. Defaultnya adalah guard default jika tidak disediakan.
     * @return \Symfony\Component\HttpFoundation\Response Objek respons (biasanya redirect atau meneruskan request).
     */
    public function handle(Request $request, Closure $next, ...$guards): Response
    {
        // Mengulang melalui setiap guard yang disediakan (atau guard default jika tidak ada).
        // $guards ?: [null] memastikan setidaknya ada satu guard untuk diulang (guard default).
        foreach ($guards ?: [null] as $guard) {
            // Memeriksa apakah user sudah login menggunakan guard saat ini.
            // Auth::guard($guard)->check() akan mengembalikan true jika user login dengan guard tersebut.
            if (Auth::guard($guard)->check()) {
                // Jika user sudah login dengan guard ini, arahkan mereka ke halaman dashboard.
                // route('dashboard') akan menghasilkan URL untuk named route 'dashboard'.
                // Anda bisa mengganti 'dashboard' dengan rute lain jika perlu,
                // atau menggunakan RouteServiceProvider::HOME jika dikonfigurasi di sana.
                return redirect()->route('dashboard');
            }
        }

        // Jika user belum login dengan guard manapun yang diperiksa,
        // teruskan request ke middleware berikutnya dalam pipeline atau ke controller.
        return $next($request);
    }
}
