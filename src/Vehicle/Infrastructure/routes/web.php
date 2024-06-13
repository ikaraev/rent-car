<?php

use Illuminate\Support\Facades\Route;
use Karaev\Vehicle\Infrastructure\Http\Controllers\Frontend\IndexController;
use Karaev\Vehicle\Infrastructure\Http\Controllers\Frontend\VehicleController;

Route::group(['as' => 'frontend.'], function () {
    Route::get('/', [IndexController::class, 'index'])->name('index');

    Route::group(['prefix' => 'vehicle', 'as' => 'vehicle.'], function () {
        Route::get('/{url_rewrite}', [VehicleController::class, 'index'])->name('index');
    });
});
