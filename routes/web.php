<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('index');
    });
});


Route::middleware(['guest'])->group(function () {
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::get('/register', [UserController::class, 'register'])->name('register');
    Route::get('/forgot-password', [UserController::class, 'forgotPassword'])->name('forgot_password');
    Route::post('/forgot-password', [UserController::class, 'mailForgotPassword'])->name('mailForgotPassword');
    Route::get('/reset-password/{email}', [UserController::class, 'getpasswword'])->name('getpasswword');
    Route::post('/reset-password/{email}', [UserController::class, 'getforgotpassword'])->name('getforgotpassword');
});

Route::prefix('account')->group(function () {  
    Route::post('/register', [UserController::class, 'userRegister'])->name('userRegister');
    Route::post('/login', [UserController::class, 'userLogin'])->name('userLogin');
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
});

Route::prefix('profile')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('profile');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('profile_edit');
    Route::post('/update/{id}', [UserController::class, 'update'])->name('profile_update');
});

