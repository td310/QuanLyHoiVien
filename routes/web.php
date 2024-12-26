<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommitteeController;
use App\Http\Controllers\MemFeeController;
use App\Http\Controllers\SponsorshipController;

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
    Route::get('/fees/{id}', [CommitteeController::class, 'fees'])->name('fees.customer_partner');
    Route::get('/sponsorships/{id}', [CommitteeController::class, 'sponsorships'])->name('sponsorships.customer_partner');

    Route::post('/store', [CommitteeController::class, 'store'])->name('store.customer_partner');
    Route::delete('/delete/{id}', [CommitteeController::class, 'destroy'])->name('delete.customer_partner');
    Route::put('/update/{id}', [CommitteeController::class, 'update'])->name('update.customer_partner');
});

Route::prefix('membership-fee')->group(function () {
    Route::get('/', [MemFeeController::class, 'index'])->name('index.membership_fee');
    Route::get('/create', [MemFeeController::class, 'create'])->name('create.membership_fee');
    Route::get('/show/{id}', [MemFeeController::class, 'show'])->name('show.membership_fee');

    Route::post('/store', [MemFeeController::class, 'store'])->name('membership_fee.store');
    Route::post('/pay/{id}', [MemFeeController::class, 'pay'])->name('pay.membership_fee');
    Route::delete('/delete/{id}', [MemFeeController::class, 'destroy'])->name('delete.membership_fee');
});

Route::prefix('sponsorship')->group(function () {
    Route::get('/', [SponsorshipController::class, 'index'])->name('index.sponsorship');
    Route::get('/create', [SponsorshipController::class, 'create'])->name('create.sponsorship');
    Route::get('/show/{id}', [SponsorshipController::class, 'show'])->name('show.sponsorship');

    Route::post('/store', [SponsorshipController::class, 'store'])->name('store.sponsorship');
    Route::delete('/delete/{id}', [SponsorshipController::class, 'destroy'])->name('delete.sponsorship');
});