<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use \App\Http\Middleware\isAuth;
use \App\Http\Middleware\isAdmin;
use App\Http\Middleware\isGuest;



//is Auth so can't go back to the login page, gets redirected on home page
Route::middleware([isAuth::class])->group(function () {
    Route::view('/login', 'login')->name('get.login');
    Route::view('/register', 'register')->name('get.register');
});

// is Guest so can't access main page sites, gets redirected on login page
Route::middleware([isGuest::class])->group(function () {
    Route::get('/', [PageController::class, 'home'])->name('get.home');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::prefix('/contact')->group(function () {
        Route::view('/', 'contact')->name('get.contact');
        Route::post('/', [ContactController::class, 'storeComments'])->name('post.contact');
    });
    Route::prefix('/books')->group(function () {
        Route::get('/', [PageController::class, 'books'])->name('get.books');
        Route::get('/{id}/details', [PageController::class, 'details'])->name('get.book.details');
    });
});



Route::post('/login', [UserController::class, 'signin'])->name('post.login');
Route::post('/register', [UserController::class, 'signup'])->name('post.register');


// admin only
Route::group(['prefix' => 'admin', 'middleware' => isAdmin::class], function () {
    Route::get('/', [AdminController::class, 'admin'])->name('get.admin');
    Route::view('/create', 'admin.create')->name('get.admin.create');
    Route::get('/comments', [AdminController::class, 'comments'])->name('get.admin.comments');
    Route::get('/comments/{id}/delete', [AdminController::class, 'deleteComment'])->name('delete.admin.comment');
    Route::post('/create', [AdminController::class, 'storeListing'])->name('post.admin.create');
    Route::get('/{id}/delete', [AdminController::class, 'deleteListing'])->name('delete.listing');
    Route::get('/{id}/edit', [AdminController::class, 'editListing'])->name('edit.listing');
    Route::put('/{id}/update', [AdminController::class, 'updateListing'])->name('update.listing');
});