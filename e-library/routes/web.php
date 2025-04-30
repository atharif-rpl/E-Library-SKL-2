<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard.index');
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard.index');

Route::get('/create', function () {
    return view('books.create');
})->name('books.create');

Route::get('/profile', function () {
    return view('books.profile');
})->name('books.profile');

Route::get('/editprofile', function () {
    return view('books.editprofile');
})->name('books.editprofile');

Route::get('/register', function () {
    return view('auth.register');
})->name('auth.register');

Route::get('/login', function () {
    return view('auth.login');
})->name('auth.login');

// Route untuk login, diberi nama "login"

// Route::get('/login', function () {
//     return view('auth.login');
// })->name('login');

// Redirect root ke login

// Route::redirect('/', '/login');

// Route untuk register

// Route::get('/register', function () {
//     return view('auth.register');
// })->name('register');