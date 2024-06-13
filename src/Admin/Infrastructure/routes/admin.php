<?php

use Illuminate\Support\Facades\Route;
use Karaev\Admin\Infrastructure\Http\Controllers\DashboardController;
use Karaev\Admin\Infrastructure\Http\Controllers\Auth\AuthenticatedSessionController;

Route::group(['prefix' => env('ADMIN_URL_PREFIX'), 'as' => 'admin.'], function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('adminLogin');
    Route::post('/login', [AuthenticatedSessionController::class, 'login'])->name('adminPostLogin');

    Route::group(['middleware' => 'adminauth'], function () {
        Route::get('/dashboard', [DashboardController::class, 'execute'])->name('dashboard');
    });
});

