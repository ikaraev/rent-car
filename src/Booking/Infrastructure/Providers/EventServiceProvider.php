<?php

namespace Karaev\Booking\Infrastructure\Providers;

use Karaev\Booking\Infrastructure\Eloquent\Model\Booking;
use Karaev\Booking\Infrastructure\Observers\BookingPropertyObserver;
use Karaev\Booking\Infrastructure\Observers\BookingContactFormObserver;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Karaev\Booking\Infrastructure\Observers\Sender\EmailReservationNotificationObserver;
use Karaev\Booking\Infrastructure\Observers\Component\SidebarInitializationObserver;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        'api_booking_created_success' => [
            EmailReservationNotificationObserver::class,
        ],
        'before_initialization_sidebar' => [
            SidebarInitializationObserver::class,
        ]
    ];

    public function boot()
    {
        parent::boot();

        Booking::observe([
            BookingPropertyObserver::class,
            BookingContactFormObserver::class
        ]);
    }
}
