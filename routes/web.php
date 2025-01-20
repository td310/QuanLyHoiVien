<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommitteeController;
use App\Http\Controllers\CusCorporateController;
use App\Http\Controllers\MemFeeController;
use App\Http\Controllers\SponsorshipController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\TargetCustomerController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\MemLevelController;
use App\Http\Controllers\ClubController;

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

//Ban chấp hành
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

//Khách hàng doanh nghiệp
Route::prefix('customer-corporate')->group(function () {
    Route::get('/', [CusCorporateController::class, 'index'])->name('index.customer_corporate');
    Route::get('/create', [CusCorporateController::class, 'create'])->name('create.customer_corporate');
    Route::get('/edit/{id}', [CusCorporateController::class, 'edit'])->name('edit.customer_corporate');
    Route::get('/show/{id}', [CusCorporateController::class, 'show'])->name('show.customer_corporate');
    Route::get('/fees/{id}', [CusCorporateController::class, 'fees'])->name('fees.customer_corporate');
    Route::get('/sponsorships/{id}', [CusCorporateController::class, 'sponsorships'])->name('sponsorships.customer_corporate');

    Route::post('/store', [CusCorporateController::class, 'store'])->name('store.customer_corporate');
    Route::put('/update/{id}', [CusCorporateController::class, 'update'])->name('update.customer_corporate');
    Route::delete('/destroy/{id}', [CusCorporateController::class, 'destroy'])->name('destroy.customer_corporate');
});

//Hội Phí
Route::prefix('membership-fee')->group(function () {
    Route::get('/', [MemFeeController::class, 'index'])->name('index.membership_fee');
    Route::get('/create', [MemFeeController::class, 'create'])->name('create.membership_fee');
    Route::get('/show/{id}', [MemFeeController::class, 'show'])->name('show.membership_fee');

    Route::post('/store', [MemFeeController::class, 'store'])->name('membership_fee.store');
    Route::post('/pay/{id}', [MemFeeController::class, 'pay'])->name('pay.membership_fee');
    Route::delete('/delete/{id}', [MemFeeController::class, 'destroy'])->name('delete.membership_fee');
});

//Tài trợ
Route::prefix('sponsorship')->group(function () {
    Route::get('/', [SponsorshipController::class, 'index'])->name('index.sponsorship');
    Route::get('/create', [SponsorshipController::class, 'create'])->name('create.sponsorship');
    Route::get('/show/{id}', [SponsorshipController::class, 'show'])->name('show.sponsorship');

    Route::post('/store', [SponsorshipController::class, 'store'])->name('store.sponsorship');
    Route::delete('/delete/{id}', [SponsorshipController::class, 'destroy'])->name('delete.sponsorship');
});

//Cài đặt - Ngành
Route::prefix('major')->group(function () {
    Route::get('/', [MajorController::class, 'index'])->name('index.major');
    Route::get('/create', [MajorController::class, 'create'])->name('create.major');
    Route::get('/edit/{id}', [MajorController::class, 'edit'])->name('edit.major');
    Route::get('/show/{id}', [MajorController::class, 'show'])->name('show.major');
    
    Route::post('/store', [MajorController::class, 'store'])->name('store.major');
    Route::put('/update/{id}', [MajorController::class, 'update'])->name('update.major');
    Route::delete('/destroy/{id}', [MajorController::class, 'destroy'])->name('destroy.major');
});

//Cài đặt - Lĩnh vực
Route::prefix('field')->group(function () {
    Route::get('/', [FieldController::class, 'index'])->name('index.field');
    Route::get('/create', [FieldController::class, 'create'])->name('create.field');
    Route::get('/edit/{id}', [FieldController::class, 'edit'])->name('edit.field');
    Route::get('/show/{id}', [FieldController::class, 'show'])->name('show.field');
    
    Route::post('/store', [FieldController::class, 'store'])->name('store.field');
    Route::put('/update/{id}', [FieldController::class, 'update'])->name('update.field');
    Route::delete('/destroy/{id}', [FieldController::class, 'destroy'])->name('destroy.field');
    Route::post('/field/delete-subgroup', [FieldController::class, 'deleteSubgroup'])->name('delete.subgroup');
});

//Cài đặt - Thị trường
Route::prefix('market')->group(function () {
    Route::get('/', [MarketController::class, 'index'])->name('index.market');
    Route::get('/create', [MarketController::class, 'create'])->name('create.market');
    Route::get('/edit/{id}', [MarketController::class, 'edit'])->name('edit.market');
    Route::get('/show/{id}', [MarketController::class, 'show'])->name('show.market');
    
    Route::post('/store', [MarketController::class, 'store'])->name('store.market');
    Route::put('/update/{id}', [MarketController::class, 'update'])->name('update.market');
    Route::delete('/destroy/{id}', [MarketController::class, 'destroy'])->name('destroy.market');
});

//Cài đặt - Mục tiêu khách hàng
Route::prefix('target_customer')->group(function () {
    Route::get('/', [TargetCustomerController::class, 'index'])->name('index.target_customer');
    Route::get('/create', [TargetCustomerController::class, 'create'])->name('create.target_customer');
    Route::get('/edit/{id}', [TargetCustomerController::class, 'edit'])->name('edit.target_customer');
    Route::get('/show/{id}', [TargetCustomerController::class, 'show'])->name('show.target_customer');
    
    Route::post('/store', [TargetCustomerController::class, 'store'])->name('store.target_customer');
    Route::put('/update/{id}', [TargetCustomerController::class, 'update'])->name('update.target_customer');
    Route::delete('/destroy/{id}', [TargetCustomerController::class, 'destroy'])->name('destroy.target_customer');
});

//Cài đặt - Chứng chỉ
Route::prefix('certificate')->group(function () {
    Route::get('/', [CertificateController::class, 'index'])->name('index.certificate');
    Route::get('/create', [CertificateController::class, 'create'])->name('create.certificate');
    Route::get('/edit/{id}', [CertificateController::class, 'edit'])->name('edit.certificate');
    Route::get('/show/{id}', [CertificateController::class, 'show'])->name('show.certificate');
    
    Route::post('/store', [CertificateController::class, 'store'])->name('store.certificate');
    Route::put('/update/{id}', [CertificateController::class, 'update'])->name('update.certificate');
    Route::delete('/destroy/{id}', [CertificateController::class, 'destroy'])->name('destroy.certificate');
});

//Cài đặt - Tổ chức
Route::prefix('organization')->group(function () {
    Route::get('/', [OrganizationController::class, 'index'])->name('index.organization');
    Route::get('/create', [OrganizationController::class, 'create'])->name('create.organization');
    Route::get('/edit/{id}', [OrganizationController::class, 'edit'])->name('edit.organization');
    Route::get('/show/{id}', [OrganizationController::class, 'show'])->name('show.organization');
    
    Route::post('/store', [OrganizationController::class, 'store'])->name('store.organization');
    Route::put('/update/{id}', [OrganizationController::class, 'update'])->name('update.organization');
    Route::delete('/destroy/{id}', [OrganizationController::class, 'destroy'])->name('destroy.organization');
});

//Cài đặt - Doanh nghiệp
Route::prefix('business')->group(function () {
    Route::get('/', [BusinessController::class, 'index'])->name('index.business');
    Route::get('/create', [BusinessController::class, 'create'])->name('create.business');
    Route::get('/edit/{id}', [BusinessController::class, 'edit'])->name('edit.business');
    Route::get('/show/{id}', [BusinessController::class, 'show'])->name('show.business');
    
    Route::post('/store', [BusinessController::class, 'store'])->name('store.business');
    Route::put('/update/{id}', [BusinessController::class, 'update'])->name('update.business');
    Route::delete('/destroy/{id}', [BusinessController::class, 'destroy'])->name('destroy.business');
});

//Cài đặt - Hạng thành viên
Route::prefix('membership-level')->group(function () {
    Route::get('/', [MemLevelController::class, 'index'])->name('index.membership_level');
    Route::get('/create', [MemLevelController::class, 'create'])->name('create.membership_level');
    Route::get('/edit/{id}', [MemLevelController::class, 'edit'])->name('edit.membership_level');
    Route::get('/show/{id}', [MemLevelController::class, 'show'])->name('show.membership_level');
    
    Route::post('/store', [MemLevelController::class, 'store'])->name('store.membership_level');
    Route::put('/update/{id}', [MemLevelController::class, 'update'])->name('update.membership_level');
    Route::delete('/destroy/{id}', [MemLevelController::class, 'destroy'])->name('destroy.membership_level');
});

//Câu lạc bộ
Route::prefix('club')->group(function () {
    Route::get('/', [ClubController::class, 'index'])->name('index.club');
    Route::get('/create', [ClubController::class, 'create'])->name('create.club');
    Route::get('/edit/{id}', [ClubController::class, 'edit'])->name('edit.club');
    Route::get('/show/{id}', [ClubController::class, 'show'])->name('show.club');
    
    Route::post('/store', [ClubController::class, 'store'])->name('store.club');
    Route::put('/update/{id}', [ClubController::class, 'update'])->name('update.club');
    Route::delete('/destroy/{id}', [ClubController::class, 'destroy'])->name('destroy.club');
});

Route::get('/api/fields-by-major/{major}', [ClubController::class, 'getFieldsByMajor']);
