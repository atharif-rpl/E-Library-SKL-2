<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;

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
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('auth.login');
    Route::post('/login', [AuthController::class, 'login'])->name('login');

    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('auth.register');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});

// Rute Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Grup Rute Terproteksi (Memerlukan Autentikasi)
Route::middleware('auth')->group(function () {

    // Rute Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Rute Buku (Index dan Show bisa diakses semua user yang login)
    Route::get('/books', [BooksController::class, 'index'])->name('books.index');
    Route::get('/books/{show}', [BooksController::class, 'show'])->name('books.show');

    // Rute Profil User (Memerlukan Autentikasi)
    // Sekarang mengarah ke AuthController
    Route::get('books/profile', [AuthController::class, 'profile'])->name('books.profile');
    Route::post('books/editprofile', [AuthController::class, 'editprofile'])->name('books.editprofile');


    // Grup Rute Khusus Admin (Memerlukan Role Admin)
    // Rute di dalam grup ini memerlukan user login DAN ber-role 'admin'
    // Pastikan alias 'admin' terdaftar dengan benar di app/Http/Kernel.php
    Route::middleware('admin')->group(function() {
        // Rute CRUD Buku (Hanya Admin)
        // Penting: Rute '/books/create' harus didefinisikan SEBELUM rute '/books/{book}'
        // agar Laravel tidak salah mengira 'create' sebagai ID buku saat Route Model Binding.
        Route::get('/create', [BooksController::class, 'create'])->name('books.create');
        Route::post('/books', [BooksController::class, 'store'])->name('books.store');
        Route::get('/books/{book}/edit', [BooksController::class, 'edit'])->name('books.edit');
        Route::put('/books/{book}', [BooksController::class, 'update'])->name('books.update');
        Route::delete('/books/{book}', [BooksController::class, 'destroy'])->name('books.destroy');
    });

}); // Akhir dari grup middleware 'auth'

// Rute Redirect
Route::redirect('/', '/books');

// Fallback Route (Halaman 404)
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
