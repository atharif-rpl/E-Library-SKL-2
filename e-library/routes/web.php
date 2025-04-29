<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.register');
});

// Route untuk login, diberi nama "login"
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Redirect root ke login
Route::redirect('/', '/login');

// Route untuk register
Route::get('/register', function () {
    return view('auth.register');
})->name('register');