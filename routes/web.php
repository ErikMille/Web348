<?php

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

Route::get('/example', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['auth']);
Route::get('/user/{id}', [App\Http\Controllers\HomeController::class, 'show'])->name('user')->middleware(['auth']);
Route::get('/recent_posts', [App\Http\Controllers\PostController::class, 'index'])->name('recent_posts')->middleware(['auth']);
Route::get('/post/{id}', [App\Http\Controllers\PostController::class, 'show'])->name('post')->middleware(['auth']);

Route::get('/post/create', [PostController::class, 'create'])->name('post.store')->middleware(['auth']);
Route::get('/comment/create', [CommentController::class, 'create'])->name('comment.store')->middleware(['auth']);

Route::post('/comment/store', [App\Http\Controllers\CommentController::class, 'store'])->name('comment.store')->middleware(['auth']);
Route::post('/post/store', [App\Http\Controllers\PostController::class, 'store'])->name('post.store')->middleware(['auth']);
Route::delete('/post/destroy/{id}', [App\Http\Controllers\PostController::class, 'destroy'])->name('post.destroy')->middleware(['auth']);