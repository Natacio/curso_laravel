<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::any('/posts/search',[PostController::class, 'search'])->name('posts.search')->middleware('auth');
Route::get('/posts/create',[PostController::class, 'create'])->name('posts.create')->middleware('auth');
Route::get('posts/{id}',[PostController::class, 'show'])->name('posts.show')->middleware('auth');
Route::put('/posts/{id}',[PostController::class, 'update'])->name('posts.update')->middleware('auth');
Route::get('/posts/edit/{id}',[PostController::class, 'edit'])->name('posts.edit')->middleware('auth');
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy')->middleware('auth');
Route::get('/posts',[PostController::class, 'index'])->name('posts.index')->middleware('auth');
Route::post('/posts',[PostController::class, 'store'])->name('posts.store')->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';
