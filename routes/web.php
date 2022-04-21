<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
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

Route::get('/', [PageController::class, 'home'])->name('get.home');
Route::get('/login', [PageController::class, 'loginPage'])->name('get.login');
Route::post('/login', [UserController::class, 'login'])->name('post.login');
Route::get('/register', [PageController::class, 'registerPage'])->name('get.register');
Route::post('/register', [UserController::class, 'signup'])->name('post.register');
Route::get('/logout', [PageController::class, 'logout'])->name('logout');