<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;


Route::get('/', [ProductController::class, "index"])->name('home');
Route::get('/shop', [ProductController::class, "shop"])->name('shop');

Route::middleware("guest")->group(function(){
    Route::get('/login', [AuthController::class, "login"])->name('login');
    Route::post('/login', [AuthController::class, "Postlogin"])->name('post-login');
});


Route::middleware('auth')->group(function () {
    Route::middleware('admin')->group(function () {
        Route::get('/accounts', [AccountController::class, "index"])->name('accounts');

        Route::post('/update-profile', [AccountController::class, "updateProfile"])->name('update-profile');
        Route::post('/change-password', [AccountController::class, "changePassword"])->name('change-password');
        Route::post('/store', [AccountController::class, "store"])->name('store');
        Route::post('/logout', [AuthController::class, "logout"])->name('logout');
    });
});
