<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController; 
use App\Http\Controllers\LikeController;

// Public routes
Route::post('/register', [AuthController::class, 'register']); // Rute untuk mendaftar pengguna baru
Route::post('/login', [AuthController::class, 'login']); // Rute untuk proses login

// Protected Routes
Route::group(['middleware' => ['auth:sanctum']], function() { // Grup rute yang di-proteksi oleh middleware auth:sanctum

    // User
    Route::get('/user', [AuthController::class, 'user']); // Rute untuk mendapatkan data pengguna yang sedang login
    Route::put('/user', [AuthController::class, 'update']); // Rute untuk memperbarui data pengguna yang sedang login
    Route::post('/logout', [AuthController::class, 'logout']); // Rute untuk proses logout

    // Post
    Route::get('/posts', [PostController::class, 'index']); // Rute untuk mendapatkan semua postingan
    Route::post('/posts', [PostController::class, 'store']); // Rute untuk membuat postingan baru
    Route::get('/posts/{id}', [PostController::class, 'show']); // Rute untuk mendapatkan satu postingan berdasarkan ID
    Route::put('/posts/{id}', [PostController::class, 'update']); // Rute untuk memperbarui satu postingan berdasarkan ID
    Route::delete('/posts/{id}', [PostController::class, 'destroy']); // Rute untuk menghapus satu postingan berdasarkan ID

    // Comment
    Route::get('/posts/{id}/comments', [CommentController::class, 'index']); // Rute untuk mendapatkan semua komentar dari satu postingan
    Route::post('/posts/{id}/comments', [CommentController::class, 'store']); // Rute untuk membuat komentar baru pada satu postingan
    Route::put('/comments/{id}', [CommentController::class, 'update']); // Rute untuk memperbarui satu komentar berdasarkan ID
    Route::delete('/comments/{id}', [CommentController::class, 'destroy']); // Rute untuk menghapus satu komentar berdasarkan ID

    // Like
    Route::post('/posts/{id}/likes', [LikeController::class, 'likeOrUnlike']); // Rute untuk memberikan atau menghapus suka pada satu postingan
});
