<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;

route::get('/', [BooksController::class, 'index'])->name('books.index');
route::get('books/create', [BooksController::class, 'create'])->name('books.create');
route::get('books/profile', [BooksController::class, 'profile'])->name('books.profile');
route::get('books/editprofile', [BooksController::class, 'editprofile'])->name('books.editprofile');



Route::get('/books', [BooksController::class, 'index'])->name('books.index');
    Route::get('/books/create', [BooksController::class, 'create'])->name('books.create');
    Route::post('/books', [BooksController::class, 'store'])->name('books.store');
    Route::get('/books/{book}', [BooksController::class, 'show'])->name('books.show');
    Route::get('/books/{book}/edit', [BooksController::class, 'edit'])->name('books.edit');
    Route::put('/books/{book}', [BooksController::class, 'update'])->name('books.update');
    Route::delete('/books/{book}', [BooksController::class, 'destroy'])->name('books.destroy');