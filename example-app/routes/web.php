<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/welcome', [WelcomeController::class, 'index']);
Route::get('/books', [BookController::class,'index'])->name('books.index');