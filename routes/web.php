<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use \App\Http\Middleware\isAuth;
use \App\Http\Middleware\isAdmin;
use App\Http\Middleware\isGuest;

//is Auth so can't go back to the login page, gets redirected on home page
Route::middleware([isAuth::class])->group(function () {
    Route::get('/login', [PageController::class, 'login'])->name('get.login');
    Route::get('/register', [PageController::class, 'register'])->name('get.register');
});

// is Guest so can't access main page sites, gets redirected on login page
Route::middleware([isGuest::class])->group(function () {
    Route::get('/', [PageController::class, 'home'])->name('get.home');
    Route::get('/logout', [PageController::class, 'logout'])->name('logout');
});



Route::post('/login', [UserController::class, 'signin'])->name('post.login');
Route::post('/register', [UserController::class, 'signup'])->name('post.register');



Route::get('/admin', [PageController::class, 'admin'])->middleware(isAdmin::class)->name('admin');