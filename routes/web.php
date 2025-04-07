<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [BookController::class, 'index']);
Route::get('/books/create', [BookController::class, 'create']);
Route::post('/books', [BookController::class, 'store']);
Route::get('/books/{book}/edit', [BookController::class, 'edit']);
Route::put('/books/{book}', [BookController::class, 'update']);
Route::delete('/books/{book}', [BookController::class, 'destroy']);
Route::post('/books/{book}/checkout', [BookController::class, 'checkout']);
Route::post('/books/{book}/checkin', [BookController::class, 'checkin']);
Route::get('/books/search', [BookController::class, 'search'])->name('books.search');
Route::post('/books/{book}/checkout', [BookController::class, 'checkout'])->name('books.checkout');
Route::post('/books/{book}/checkin', [BookController::class, 'checkin'])->name('books.checkin');

Route::post('/books/{book}/checkout', [BookController::class, 'checkout'])->name('books.checkout');
Route::post('/books/{book}/checkin', [BookController::class, 'checkin'])->name('books.checkin');

