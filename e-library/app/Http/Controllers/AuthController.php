<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AuthController extends Controller
{
    /**
     * Menampilkan form login.
     */
    public function showLoginForm(): View
    {
        return view('auth.login');
    }

    /**
     * Menangani permintaan login.
     */
    public function login(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => 'Kredensial yang diberikan tidak cocok dengan data kami.',
        ])->onlyInput('email');
    }

    /**
     * Menampilkan form registrasi.
     */
    public function showRegistrationForm(): View
    {
        return view('auth.register');
    }

    /**
     * Menangani permintaan registrasi.
     */
    public function register(Request $request): RedirectResponse
    {
        // Validasi input registrasi
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Password::defaults()],
            // Menggunakan 'sometimes' jika field role opsional di form.
            // Jika role selalu ada di form (dropdown), gunakan 'required'.
            // Validasi 'in' memastikan nilai yang diterima hanya 'user' atau 'admin'.
            'role' => ['sometimes', 'string', 'in:user,admin']
        ]);

        // Buat user baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            // Menghash password. Jika menggunakan casts 'hashed' di model (Laravel 10+),
            // Hash::make() di sini bisa dihilangkan, cukup gunakan $request->password.
            'password' => Hash::make($request->password),
            // Mengambil nilai role dari request.
            // Menggunakan operator null coalescing (??) untuk memberikan nilai default 'user'
            // jika $request->role adalah null (misalnya, field role tidak ada di form atau kosong).
            'role' => $request->role ?? 'user',
        ]);

        // Login user secara otomatis setelah registrasi
        Auth::login($user);

        // Redirect ke dashboard dengan pesan sukses
        return redirect('/dashboard')->with('success', 'Registrasi berhasil! Selamat datang!');
    }

    /**
     * Logout user dari aplikasi.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    /**
     * Menampilkan halaman profil user yang sedang login.
     */
    public function profile(): View
    {
        // Anda bisa mengambil data user yang sedang login di sini jika perlu
        // $user = Auth::user();
        // return view('auth.profile', compact('user'));

        // Mengembalikan view 'books.profile' sesuai kode asli Anda
        return view('books.profile');
    }

    /**
     * Menampilkan form untuk mengedit profil user yang sedang login.
     */
    public function editprofile(): View
    {
        // Anda bisa mengambil data user yang sedang login di sini jika perlu
        // $user = Auth::user();
        // return view('auth.editprofile', compact('user'));

        // Mengembalikan view 'books.editprofile' sesuai kode asli Anda
        return view('books.editprofile');
    }
}
