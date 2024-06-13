<?php

use Illuminate\Support\Facades\Route;
use Karaev\Common\Infrastructure\Http\Controllers\Api\V1\ContactRequestController;

Route::post('v1/contact/send', [ContactRequestController::class, 'execute'])->name('common.contact.send');
