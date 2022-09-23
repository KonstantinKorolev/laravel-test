<?php

use App\Http\Controllers\BookAdminController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// home page routes

Route::get('/', [HomeController::class, 'index'])->name('home.main');

Route::post('store', [HomeController::class, 'store'])->name('home.store');

Route::get('genres', [GenreController::class, 'index'])->name('home.genres');

Route::get('authors', [UserController::class, 'index'])->name('home.authors');

// authors routes

Route::get('authors/create', [UserController::class, 'create'])->name('authors.create');

Route::post('authors/store', [UserController::class, 'store'])->name('authors.store');

Route::get('authors/edit/{user}', [UserController::class, 'edit'])->name('authors.edit');

Route::post('authors/update/{user}', [UserController::class, 'update'])->name('authors.update');

Route::delete('author/update/{user}', [UserController::class, 'destroy'])->name('authors.delete');

// genres routes

Route::get('genres/create', [GenreController::class, 'create'])->name('genres.create');

Route::post('genres/store', [GenreController::class, 'store'])->name('genres.store');

Route::get('genres/edit/{genre}', [GenreController::class, 'edit'])->name('genres.edit');

Route::post('genres/update/{genre}', [GenreController::class, 'update'])->name('genres.update');

Route::delete('genres/update/{genre}', [GenreController::class, 'destroy'])->name('genres.delete');

// books routes

Route::get('books/create', [BookAdminController::class, 'create'])->name('books.create');

Route::post('books/store', [BookAdminController::class, 'store'])->name('books.store');

Route::get('books/edit/{book}', [BookAdminController::class, 'edit'])->name('books.edit');

Route::post('books/update/{book}', [BookAdminController::class, 'update'])->name('books.update');

Route::delete('books/update/{book}', [BookAdminController::class, 'destroy'])->name('books.delete');
