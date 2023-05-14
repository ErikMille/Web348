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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/recent_posts', [App\Http\Controllers\PostController::class, 'index'])->name('recent_posts');
Route::get('/post/{id}', [App\Http\Controllers\PostController::class, 'show'])->name('post');

Route::post('/comment/store', [App\Http\Controllers\CommentController::class, 'store'])->name('comment.store')->middleware(['auth']);
Route::post('/post/store', [App\Http\Controllers\PostController::class, 'store'])->name('comment.store')->middleware(['auth']);