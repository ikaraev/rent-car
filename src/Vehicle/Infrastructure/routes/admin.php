<?php

use Illuminate\Support\Facades\Route;
use Karaev\Vehicle\Infrastructure\Http\Controllers\Admin\VehicleController;
use Karaev\Vehicle\Infrastructure\Http\Controllers\Admin\VehicleImageController;

Route::group(['prefix' => env('ADMIN_URL_PREFIX'), 'as' => 'admin.'], function () {
    Route::group(['middleware' => 'adminauth'], function () {
        Route::get('/car/changelocale/{id}/{locale}', [VehicleController::class, 'changeLocale'])->name('car.change.locale');
        Route::resource('/car', VehicleController::class);
        Route::post('/car/image/upload', [VehicleImageController::class, 'execute'])->name('car.upload.image');
    });
});
