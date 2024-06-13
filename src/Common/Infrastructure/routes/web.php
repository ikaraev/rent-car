<?php

use Illuminate\Support\Facades\Route;

Route::group(['as' => 'frontend.'], function () {
    Route::get('language/{locale}', function ($locale) {
        app()->setLocale($locale);
        session()->put('locale', $locale);
        \Illuminate\Support\Facades\Cookie::queue('locale', session()->get('locale'), 5000);
        return redirect()->back();
    })->name('locale')->withoutMiddleware(\Karaev\Common\Infrastructure\Http\Middleware\Localization::class);

    Route::get('about-us', function () {
        return app(\Karaev\Common\Infrastructure\Inertia\ViewModel\Frontend\AboutUsViewModel::class)->render();
    })->name('about-us');

    Route::get('contacts', function () {
        return app(\Karaev\Common\Infrastructure\Inertia\ViewModel\Frontend\ContactUsViewModel::class)->render();
    })->name('contacts');
});
