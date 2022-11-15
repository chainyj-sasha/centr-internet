<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;

/* Authors */
Route::get('/', [AuthorController::class, 'show_all_authors'])->name('show_all_authors');
Route::resource('authors', AuthorController::class);

/* Books */
Route::get('/books/{authorId}/add', [BookController::class, 'add'])->name('book_add');
Route::resource('books', BookController::class);
