<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommitteeController;

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('index');
    })->name('main_index');
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
    Route::post('/update-avatar/{id}', [UserController::class, 'updateAvatar'])->name('profile_update_avatar');
});

Route::prefix('customer-partner')->group(function () {
    Route::get('/', [CommitteeController::class, 'index'])->name('index.customer_partner');
    Route::get('/create', [CommitteeController::class, 'create'])->name('create.customer_partner');
    Route::get('/edit/{id}', [CommitteeController::class, 'edit'])->name('edit.customer_partner');
    Route::get('/show/{id}', [CommitteeController::class, 'show'])->name('show.customer_partner');

    Route::post('/store', [CommitteeController::class, 'store'])->name('store.customer_partner');
    Route::delete('/delete/{id}', [CommitteeController::class, 'destroy'])->name('delete.customer_partner');
    Route::put('/update/{id}', [CommitteeController::class, 'update'])->name('update.customer_partner');
});
