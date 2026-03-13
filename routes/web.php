<?php

use App\Http\Controllers\CommentsController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', [PostController::class, 'index'])
    ->name('posts.index');

Route::get('/posts/{post}', [PostController::class, 'show'])
    ->name('posts.show');

Route::controller(CommentsController::class)->group(function () {
    Route::get('/comments', 'GetAllComments')->name('comments.index');
    Route::get('/comments/{id}', 'GetComment')->name('comments.show');
    // Route::post(('/comments'), 'CreateComment')->name('comments.store');
});
