<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;

route::get('/index', [BooksController::class, 'index'])->name('books.index');
route::get('books/create', [BooksController::class, 'create'])->name('books.create');
route::get('books/profile', [BooksController::class, 'profile'])->name('books.profile');
route::get('books/editprofile', [BooksController::class, 'editprofile'])->name('books.editprofile');
