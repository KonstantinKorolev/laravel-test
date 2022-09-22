<?php

use App\Http\Controllers\API\AuthorController;
use App\Http\Controllers\API\BookController;
use App\Http\Controllers\API\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('api')->group(function() {
    Route::resource('/register', RegisterController::class);
});

Route::middleware('api')->group(function() {
    Route::resource('/books', BookController::class);
});

Route::middleware('auth:api')->group(function() {
    Route::resource('/author', AuthorController::class);
});
