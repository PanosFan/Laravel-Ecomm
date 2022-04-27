<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use \App\Http\Middleware\isAuth;
use \App\Http\Middleware\isAdmin;
use App\Http\Middleware\isGuest;



//is Auth so can't go back to the login page, gets redirected on home page
Route::middleware([isAuth::class])->group(function () {
    Route::get('/login', [UserController::class, 'login'])->name('get.login');
    Route::get('/register', [UserController::class, 'register'])->name('get.register');
});

// is Guest so can't access main page sites, gets redirected on login page
Route::middleware([isGuest::class])->group(function () {
    Route::get('/', [PageController::class, 'home'])->name('get.home');
    Route::get('/contact', [PageController::class, 'contact'])->name('get.contact');
    Route::get('/books', [PageController::class, 'books'])->name('get.books');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/books/{id}/details', [PageController::class, 'details'])->name('get.book.details');
});



Route::post('/login', [UserController::class, 'signin'])->name('post.login');
Route::post('/register', [UserController::class, 'signup'])->name('post.register');


Route::middleware([isAdmin::class])->group(function () {
    Route::get('/admin', [AdminController::class, 'admin'])->name('get.admin');
    Route::get('/admin/create', [AdminController::class, 'createListing'])->name('get.admin.create');
    Route::post('/admin/create', [AdminController::class, 'storeListing'])->name('post.admin.create');
    Route::get('/admin/{id}/delete', [AdminController::class, 'deleteListing'])->name('delete.listing');
    Route::get('/admin/{id}/edit', [AdminController::class, 'editListing'])->name('edit.listing');
    Route::put('/admin/{id}/update', [AdminController::class, 'updateListing'])->name('update.listing');
});