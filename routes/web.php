<?php

use App\Http\Controllers\auth\UserController;
use App\Http\Controllers\front\PostController;
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


Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit')->scopeBindings();
Route::put('/posts/{post}/update', [PostController::class, 'update'])->name('posts.update')->scopeBindings();
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::delete('/posts/{post}/delete', [PostController::class, 'destroy'])->name('posts.destroy')->scopeBindings();


Route::get('/users/register', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/login', [UserController::class, 'login'])->name('users.login');
Route::post('/users/login', [UserController::class, 'authenticated'])->name('users.authenticated');
Route::post('/users/logout', [UserController::class, 'logout'])->name('users.logout');
