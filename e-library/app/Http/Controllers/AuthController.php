<?php

namespace App\Http\Controllers;

use App\Models\User; // Pastikan ini mengarah ke model User Anda
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Untuk otentikasi
use Illuminate\Support\Facades\Hash; // Untuk hashing password
use Illuminate\Support\Facades\Validator; // Untuk validasi
use Illuminate\Validation\Rules\Password; // Untuk validasi password modern
use Illuminate\Http\RedirectResponse; // Untuk type hinting redirect
use Illuminate\View\View; // Untuk type hinting view


class AuthController extends Controller
{
    /**
     * Menampilkan form login.
     */
    public function showLoginForm(): View
    {
        // Mengembalikan view untuk form login
        return view('auth.login');
    }

    /**
     * Menangani permintaan login.
     */
    public function login(Request $request): RedirectResponse
    {
        // 1. Validasi input login
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Ambil kredensial (email dan password) dari request
        $credentials = $request->only('email', 'password');

        // Coba otentikasi pengguna
        // Auth::attempt akan mencocokkan email dan password (setelah di-hash) di database
        // Parameter kedua ($request->boolean('remember')) mengelola fitur "ingat saya"
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            // Jika otentikasi berhasil:
            // Regenerasi ID sesi untuk mencegah serangan fiksasi sesi
            $request->session()->regenerate();

            // Arahkan ke halaman tujuan setelah login.
            // intended() akan mengarahkan ke URL yang terakhir kali dicoba sebelum login,
            // atau ke '/dashboard' jika tidak ada URL tujuan sebelumnya.
            return redirect()->intended('/dashboard'); // Ganti '/dashboard' jika rute tujuan default Anda berbeda
        }

        // Jika otentikasi gagal:
        // Kembali ke halaman login dengan pesan error dan input email sebelumnya
        return back()->withErrors([
            'email' => 'Kredensial yang diberikan tidak cocok dengan data kami.', // Pesan error bisa disesuaikan
        ])->onlyInput('email'); // Hanya pertahankan nilai input email yang salah
    }

    /**
     * Menampilkan form registrasi.
     */
    public function showRegistrationForm(): View
    {
        // Mengembalikan view untuk form registrasi
        return view('auth.register');
    }

    /**
     * Menangani permintaan registrasi.
     */
    public function register(Request $request): RedirectResponse
    {
        // 1. Validasi input registrasi
        // Untuk form registrasi publik, kita tidak meminta input role dari user,
        // melainkan menetapkan role default ('user') setelah validasi berhasil.
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'], // Pastikan email unik di tabel users
            'password' => ['required', 'confirmed', Password::defaults()], // 'confirmed' memastikan ada input password_confirmation & cocok
            'role' => 'required|string|in:user,admin'                                                              // Password::defaults() menerapkan aturan password minimum Laravel
        ]);

        // 2. Buat user baru
        // Menggunakan data TERVALIDASI ($request->...) untuk membuat user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // WAJIB HASH PASSWORD (Atau pastikan di-cast 'hashed' di model User)
            'role' => $request->role, // <-- Atur role default 'user' di sini untuk user yang mendaftar sendiri
        ]);

        // 3. Login user secara otomatis setelah registrasi (opsional, tapi umum)
        Auth::login($user);

        // 4. Redirect ke halaman setelah registrasi berhasil (misal: dashboard)
        return redirect('/dashboard'); // Ganti '/dashboard' jika rute tujuan Anda berbeda
    }

    /**
     * Logout user dari aplikasi.
     */
    public function logout(Request $request): RedirectResponse
    {
        // Lakukan proses logout
        Auth::logout();

        // Invalidasi sesi user saat ini
        $request->session()->invalidate();

        // Regenerasi token CSRF untuk sesi baru
        $request->session()->regenerateToken();

        // Arahkan ke halaman setelah logout (misal: halaman utama atau login)
        return redirect('/'); // Ganti '/' jika rute tujuan setelah logout Anda berbeda
    }

    // Anda bisa hapus metode resource lainnya (create, store, show, edit, update, destroy)
    // jika controller ini hanya digunakan untuk autentikasi.
}
