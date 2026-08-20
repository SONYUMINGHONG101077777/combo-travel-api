<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\TourismNewsController;


// ================= AUTH =================

Route::post('/signup', [AuthController::class, 'signup']);

Route::post('/signin', [AuthController::class, 'signin'])
    ->name('login');

Route::post('/verify-otp', [AuthController::class, 'verifyOTP']);

Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);

Route::post('/verify-reset-otp', [AuthController::class, 'verifyResetOTP']);

Route::post('/reset-password', [AuthController::class, 'resetPassword']);


// ================= PUBLIC =================

// Homepage Carousel
Route::get('/banners', [BannerController::class, 'index']);

// Homepage Destination
Route::get('/destinations', [DestinationController::class, 'index']);

Route::get('/destinations/{destination}', [DestinationController::class, 'show']);


// ================= AUTH REQUIRED =================

Route::middleware('auth:sanctum')->group(function () {


    // -------- Profile --------

    Route::get('/profile',
        [ProfileController::class,'profile']
    );

    Route::put('/profile/update',
        [ProfileController::class,'update']
    );

    Route::post('/profile/change-password',
        [ProfileController::class,'changePassword']
    );

    Route::post('/logout',
        [ProfileController::class,'logout']
    );


    // -------- Settings --------

    Route::get('/settings',
        [SettingsController::class,'show']
    );

    Route::put('/settings',
        [SettingsController::class,'update']
    );


    // -------- Banner Admin --------

    Route::post('/banners',
        [BannerController::class,'store']
    );

    Route::put('/banners/{banner}',
        [BannerController::class,'update']
    );

    Route::delete('/banners/{banner}',
        [BannerController::class,'destroy']
    );


    // -------- Destination Admin --------

    Route::post('/destinations',
        [DestinationController::class,'store']
    );

    Route::put('/destinations/{destination}',
        [DestinationController::class,'update']
    );

    Route::delete('/destinations/{destination}',
        [DestinationController::class,'destroy']
    );


    // -------- Destination Options --------

    Route::post('/destinations/{destination}/options',
        [DestinationController::class,'addOption']
    );

    Route::put('/destination-options/{option}',
        [DestinationController::class,'updateOption']
    );

    Route::delete('/destination-options/{option}',
        [DestinationController::class,'deleteOption']
    );

});

// -------- Tourism News (public) --------
Route::get('/tourism-news', [TourismNewsController::class, 'index']);
Route::get('/tourism-news/{id}', [TourismNewsController::class, 'show']);
Route::post('/tourism-news', [TourismNewsController::class, 'store']);
Route::put('/tourism-news/{id}', [TourismNewsController::class, 'update']);
Route::delete('/tourism-news/{id}', [TourismNewsController::class, 'destroy']);