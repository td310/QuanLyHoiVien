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
use App\Http\Controllers\PersonalCustomerController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ActivityController;

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

//Khách hàng cá nhân
Route::prefix('customer-personal')->group(function () {
    Route::get('/', [PersonalCustomerController::class, 'index'])->name('index.customer_personal');
    Route::get('/create', [PersonalCustomerController::class, 'create'])->name('create.customer_personal');
    Route::get('/edit/{id}', [PersonalCustomerController::class, 'edit'])->name('edit.customer_personal');
    Route::get('/show/{id}', [PersonalCustomerController::class, 'show'])->name('show.customer_personal');

    Route::post('/store', [PersonalCustomerController::class, 'store'])->name('store.customer_personal');
    Route::delete('/delete/{id}', [PersonalCustomerController::class, 'destroy'])->name('delete.customer_personal');
    Route::put('/update/{id}', [PersonalCustomerController::class, 'update'])->name('update.customer_personal');
});

//đối tác doanh nghiệp
Route::prefix('partner')->group(function () {
    Route::get('/', [PartnerController::class, 'index'])->name('index.partner');
    Route::get('/create', [PartnerController::class, 'create'])->name('create.partner');
    Route::get('/edit/{id}', [PartnerController::class, 'edit'])->name('edit.partner');
    Route::get('/show/{id}', [PartnerController::class, 'show'])->name('show.partner');

    Route::post('/store', [PartnerController::class, 'store'])->name('store.partner');
    Route::delete('/delete/{id}', [PartnerController::class, 'destroy'])->name('delete.partner');
    Route::put('/update/{id}', [PartnerController::class, 'update'])->name('update.partner');
});

//Thông báo
Route::prefix('notification')->group(function () {
    Route::get('/', [NotificationController::class, 'index'])->name('index.notification');
    Route::get('/create', [NotificationController::class, 'create'])->name('create.notification');
    Route::get('/edit/{id}', [NotificationController::class, 'edit'])->name('edit.notification');
    Route::get('/show/{id}', [NotificationController::class, 'show'])->name('show.notification');

    Route::post('/store', [NotificationController::class, 'store'])->name('store.notification');
    Route::delete('/delete/{id}', [NotificationController::class, 'destroy'])->name('delete.notification');
    Route::put('/update/{id}', [NotificationController::class, 'update'])->name('update.notification');
});

//Lịch họp
Route::prefix('calendar')->group(function () {
    Route::get('/', [CalendarController::class, 'index'])->name('index.calendar');
    Route::get('/create', [CalendarController::class, 'create'])->name('create.calendar');
    Route::get('/edit/{id}', [CalendarController::class, 'edit'])->name('edit.calendar');
    Route::get('/show/{id}', [CalendarController::class, 'show'])->name('show.calendar');

    Route::post('/store', [CalendarController::class, 'store'])->name('store.calendar');
    Route::delete('/delete/{id}', [CalendarController::class, 'destroy'])->name('delete.calendar');
    Route::put('/update/{id}', [CalendarController::class, 'update'])->name('update.calendar');
    Route::get('/events', [CalendarController::class, 'getEvents'])->name('calendar.events');
});

//Hoạt động
Route::prefix('activity')->group(function () {
    Route::get('/', [ActivityController::class, 'index'])->name('index.activity');
    Route::get('/create', [ActivityController::class, 'create'])->name('create.activity');
    Route::get('/edit/{id}', [ActivityController::class, 'edit'])->name('edit.activity');
    Route::get('/show/{id}', [ActivityController::class, 'show'])->name('show.activity');
    Route::get('/showCustomer/{id}', [ActivityController::class, 'showCustomers'])->name('showCustomer.activity');

    Route::post('/store', [ActivityController::class, 'store'])->name('store.activity');
    Route::delete('/delete/{id}', [ActivityController::class, 'destroy'])->name('delete.activity');
    Route::put('/update/{id}', [ActivityController::class, 'update'])->name('update.activity');
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
