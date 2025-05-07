<?php

use Illuminate\Support\Facades\Route; // Mengimpor Facade Route untuk mendefinisikan rute.
use App\Http\Controllers\BooksController; // Mengimpor BooksController.
use App\Http\Controllers\DashboardController; // Mengimpor DashboardController.
use App\Http\Controllers\AuthController; // Mengimpor AuthController untuk rute otentikasi.

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

    // Rute untuk Menampilkan Daftar Buku (Bisa diakses oleh semua user yang login)
    // Diletakkan di dalam grup 'auth' tetapi di luar grup 'admin' di bawahnya.
    Route::get('/books', [BooksController::class, 'index'])->name('books.index');

    // Rute Spesifik Buku (Show)
    // Rute ini untuk menampilkan detail satu buku berdasarkan ID ({book}).
    // {book} adalah parameter rute yang akan di-resolve ke instance model Books
    // oleh Route Model Binding (jika Anda menggunakan Books $book di parameter method controller).
    // Diletakkan di sini (di dalam grup 'auth' tapi di luar grup 'admin')
    // karena semua user yang login bisa melihat detail buku.
    Route::get('/books/{book}', [BooksController::class, 'show'])->name('books.show');

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

        // Catatan: Rute 'profile' dan 'editprofile' yang ada di kode asli Anda (dan di komentar di bawah)
        // sepertinya tidak terkait langsung dengan BooksController dalam konteks CRUD buku.
        // Jika ini adalah rute untuk profil pengguna, sebaiknya diletakkan di luar grup 'admin'
        // atau di grup terpisah jika hanya untuk user biasa. Saya hapus duplikasinya di bawah.
        // Jika BooksController memang menangani profil user (tidak umum),
        // Anda bisa tambahkan di sini jika hanya admin yang bisa mengaksesnya,
        // atau di grup 'auth' di luar grup 'admin' jika user bisa mengakses profilnya sendiri.
        // Route::get('books/profile', [BooksController::class, 'profile'])->name('books.profile');
        // Route::get('books/editprofile', [BooksController::class, 'editprofile'])->name('books.editprofile');
    });

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

// Catatan: Rute-rute duplikat di bagian bawah kode asli Anda sudah dihapus
// karena sudah dimasukkan ke dalam grup yang sesuai di atas.

// Rute profile yang sepertinya terpisah dan tidak dalam grup 'auth' atau 'admin'.
// Jika ini adalah rute profil user (bukan buku), sebaiknya diletakkan di grup 'auth'.
// Jika hanya admin yang bisa akses profil user lain, bisa di dalam grup 'admin'.
// Jika user bisa akses profilnya sendiri, di dalam grup 'auth'.
Route::get('/books/profile', [BooksController::class, 'profile'])->name('books.profile'); // Rute ini masih ada di luar grup

