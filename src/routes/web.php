<?php

use Illuminate\Support\Facades\Route;
use \UserAuth\laravelMobileAuth\Http\Controllers as Controller;

Route::middleware('web')->group(function () {
    Route::post('login', 'LoginController@login')->name('login');
    Route::get('login', [Controller\AuthController::class, 'login'])->name('laravelMobileAuthLogin');

    Route::get('password', [Controller\AuthController::class, 'password'])->name('laravelMobileAuthPassword');
    Route::get('otp-login', [Controller\AuthController::class, 'otpLogin'])->name('laravelMobileAuthOtpLogin');
    Route::post('check-otp-login', [Controller\AuthController::class, 'CheckOtpLogin'])->name('laravelMobileAuthCheckOtpLogin');

    Route::post('auth', [Controller\AuthController::class, 'checkAuth'])->name('laravelMobileAuthCheckAuth');
    Route::post('password-login', [Controller\AuthController::class, 'PasswordLogin'])->name('laravelMobileAuthPasswordLogin');
    Route::post('password-login', [Controller\AuthController::class, 'PasswordLogin'])->name('laravelMobileAuthPasswordLogin');


    Route::group(['middleware' => 'auth'], function () {
        Route::get('dashboard', [Controller\AuthController::class, 'dashboardAdmin'])->name('laravelMobileAuthDashboard');
        Route::get('authLogout', [Controller\AuthController::class, 'authLogout'])->name('laravelMobileAuthLogout');

    });

});
