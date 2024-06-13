<?php

use Illuminate\Support\Facades\Route;
use Karaev\Booking\Infrastructure\Http\Controllers\Api\CreateBookingController;

Route::post('v1/book/create', [CreateBookingController::class, 'execute'])->name('booking.execute');
