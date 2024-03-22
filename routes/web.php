<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('post.home');
Route::get('/index', [App\Http\Controllers\PostController::class, 'index'])->name('post.index');
Route::get('/create', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');
Route::post('/store', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
Route::get('/edit/{id}', [App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');
Route::put('/update/{id}', [App\Http\Controllers\PostController::class, 'update'])->name('post.update');

Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
Route::get('/users/{id}', [App\Http\Controllers\UserController::class, 'show'])->name('users.show');
Route::get('/users/{id}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');

Route::get('adminlte', function () {
    return view('adminlte');
});