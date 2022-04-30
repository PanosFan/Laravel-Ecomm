<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use \App\Http\Middleware\isAuth;
use \App\Http\Middleware\isAdmin;
use App\Http\Middleware\isGuest;



//is Auth so can't go back to the login page, gets redirected on home page
Route::middleware([isAuth::class])->group(function () {
    Route::view('/login', 'login')->name('get.login');
    Route::view('/register', 'register')->name('get.register');
    Route::post('/login', [UserController::class, 'signin'])->name('post.login');
    Route::post('/register', [UserController::class, 'signup'])->name('post.register');
});

// is Guest so can't access main page sites, gets redirected on login page
Route::middleware([isGuest::class])->group(function () {
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/cart/{id}', [CartController::class, 'addCart'])->name('addCart');
    Route::get('/cart', [CartController::class, 'getCart'])->name('get.Cart');
    Route::get('/checkout', [CartController::class, 'checkOut'])->name('checkOut');
    Route::get('/', [BookController::class, 'home'])->name('get.home');
    Route::prefix('/contact')->group(function () {
        Route::view('/', 'contact')->name('get.contact');
        Route::post('/', [ContactController::class, 'storeComments'])->name('post.contact');
    });
    Route::prefix('/books')->group(function () {
        Route::get('/', [BookController::class, 'books'])->name('get.books');
        Route::get('/{id}/details', [BookController::class, 'details'])->name('get.book.details');
    });
});



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