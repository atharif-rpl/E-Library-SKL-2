<?php

use Illuminate\Support\Facades\Route; // Mengimpor Facade Route untuk mendefinisikan rute.
use App\Http\Controllers\BooksController; // Mengimpor BooksController.
use App\Http\Controllers\DashboardController; // Mengimpor DashboardController.
use App\Http\Controllers\AuthController; // Mengimpor AuthController untuk rute otentikasi dan profil user.
// Jika Anda memiliki UserProfileController yang terpisah, Anda mungkin perlu mengimpornya di sini:
// use App\Http\Controllers\UserProfileController;

// Pastikan Anda memiliki middleware 'admin' terdaftar di app/Http/Kernel.php
// Jika Anda menggunakan RoleMiddleware yang kita buat, aliasnya mungkin 'role'.
// Jika 'admin' adalah alias untuk middleware yang mengecek role admin, maka ini sudah benar.
// use App\Http\Middleware\RoleMiddleware; // Contoh jika menggunakan RoleMiddleware

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Rute Autentikasi (Login & Register)
// Grup ini menggunakan middleware 'guest'. Middleware 'guest' akan mengarahkan
// user yang sudah login ke halaman lain (biasanya '/home' atau '/dashboard')
// jika mereka mencoba mengakses rute di dalam grup ini.
Route::middleware('guest')->group(function () {
    // Menampilkan form login.
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('auth.login');
    // Memproses data login (request POST dari form login).
    // Nama rute 'login' umumnya digunakan untuk rute POST login.
    Route::post('/login', [AuthController::class, 'login'])->name('login');

    // Menampilkan form registrasi.
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('auth.register');
    // Memproses data registrasi (request POST dari form registrasi).
    // Memberi nama spesifik seperti 'register' untuk rute POST register.
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});

// Rute Logout
// Rute ini memerlukan user sudah login ('auth') untuk bisa diakses.
// Metode POST digunakan untuk keamanan (mencegah logout via link GET).
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Grup Rute Terproteksi (Memerlukan Autentikasi)
// Semua rute di dalam grup ini hanya bisa diakses oleh user yang sudah login.
Route::middleware('auth')->group(function () {

    // Rute Dashboard
    // Ini adalah halaman default setelah user login (jika tidak ada intended URL).
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Rute Buku (Index dan Show bisa diakses semua user yang login)
    // Diletakkan di dalam grup 'auth' tetapi di luar grup 'admin' di bawahnya.
    Route::get('/books', [BooksController::class, 'index'])->name('books.index');

    // Rute Spesifik Buku (Show)
    // Rute ini untuk menampilkan detail satu buku berdasarkan ID ({book}).
    // {book} adalah parameter rute yang akan di-resolve ke instance model Books
    // oleh Route Model Binding (jika Anda menggunakan Books $book di parameter method controller).
    // Diletakkan di sini (di dalam grup 'auth' tapi di luar grup 'admin')
    // karena semua user yang login bisa melihat detail buku.
    Route::get('/books/{book}', [BooksController::class, 'show'])->name('books.show');

    // Rute Profil User (Memerlukan Autentikasi, Bisa Diakses Semua User yang Login)
    // Dipindahkan ke sini, di dalam grup 'auth' tapi di luar grup 'admin'.
    // Asumsi rute ini untuk user yang login melihat/mengedit profilnya sendiri.
    // Sekarang mengarah ke AuthController.
    Route::get('books/profile', [AuthController::class, 'profile'])->name('books.profile');
    Route::get('books/editprofile', [AuthController::class, 'editprofile'])->name('books.editprofile');


    // Grup Rute Khusus Admin (Memerlukan Role Admin)
    // Grup ini menggunakan middleware 'admin'. Pastikan middleware ini terdaftar
    // di app/Http/Kernel.php dan melakukan cek role admin (misalnya, Auth::user()->role === 'admin').
    // Jika Anda menggunakan RoleMiddleware kustom, ganti 'admin' dengan alias middleware Anda
    // dan tambahkan parameter role (misal: 'role:admin').
    Route::middleware('admin')->group(function() {
    // Contoh jika menggunakan App\Http\Middleware\RoleMiddleware dengan parameter 'admin':
    // Route::middleware(App\Http\Middleware\RoleMiddleware::class . ':admin')->group(function() {
    // Atau jika sudah ada alias 'role' di Kernel.php:
    // Route::middleware('role:admin')->group(function() {

        // Rute untuk Menampilkan Form Tambah Buku (GET)
        // Penting: Rute '/books/create' harus didefinisikan SEBELUM rute '/books/{book}'
        // agar Laravel tidak salah mengira 'create' sebagai ID buku saat Route Model Binding.
        Route::get('/books/create', [BooksController::class, 'create'])->name('books.create');

        // Rute untuk Menyimpan Data Buku Baru (POST)
        // Data dari form tambah buku akan dikirim ke rute ini.
        Route::post('/books', [BooksController::class, 'store'])->name('books.store');

        // Rute untuk Menampilkan Form Edit Buku (GET, Berdasarkan ID buku)
        // Menggunakan parameter {book} untuk menentukan buku mana yang akan diedit.
        Route::get('/books/{book}/edit', [BooksController::class, 'edit'])->name('books.edit');

        // Rute untuk Memperbarui Data Buku (PUT/PATCH, Berdasarkan ID buku)
        // Data dari form edit buku akan dikirim ke rute ini.
        // PUT atau PATCH digunakan untuk operasi update.
        Route::put('/books/{book}', [BooksController::class, 'update'])->name('books.update');
        // Route::patch('/books/{book}', [BooksController::class, 'update'])->name('books.update'); // PATCH juga umum digunakan untuk update

        // Rute untuk Menghapus Buku (DELETE, Berdasarkan ID buku)
        // Menggunakan metode DELETE untuk operasi penghapusan.
        Route::delete('/books/{book}', [BooksController::class, 'destroy'])->name('books.destroy');

    }); // Akhir dari grup middleware 'admin'

}); // Akhir dari grup middleware 'auth'

// Rute Redirect
// Mengarahkan halaman utama '/' langsung ke '/books'.
Route::redirect('/', '/books');

// Fallback Route
// Rute ini akan dijalankan jika tidak ada rute lain yang cocok.
// Berguna untuk menampilkan halaman 404 kustom.
// return response()->view('errors.404', [], 404); // Kode status 404 lebih umum untuk Not Found
Route::fallback(function () {
    return response()->view('errors.404', [], 404); // Mengubah status code ke 404
});
