<?php

use Illuminate\Support\Facades\Route;
use Karaev\Booking\Infrastructure\Http\Controllers\Admin\BookingController;

Route::group(['prefix' => env('ADMIN_URL_PREFIX'), 'as' => 'admin.'], function () {
    Route::group(['middleware' => 'adminauth'], function () {
        Route::resource('/booking', BookingController::class);
    });
});
