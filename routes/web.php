<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;

/* Authors */
Route::get('/', [AuthorController::class, 'show_all_authors'])->name('show_all_authors');
Route::resource('authors', AuthorController::class);

/* Books */
Route::get('/books/{authorId}/add', [BookController::class, 'add'])->name('book_add');
Route::resource('books', BookController::class);

/*User*/
Route::get('/users/logout', [UserController::class, 'logout'])->name('users.logout');
Route::post('/users/login', [UserController::class, 'login'])->name('users.login');
Route::resource('users', UserController::class);

