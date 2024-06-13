<?php

namespace Karaev\Vehicle\Infrastructure\Providers;

use Karaev\Vehicle\Infrastructure\Eloquent\Model\Vehicle;
use Karaev\Vehicle\Infrastructure\Observers\VehicleImageObserver;
use Karaev\Vehicle\Infrastructure\Observers\VehiclePropertyObserver;
use Karaev\Vehicle\Infrastructure\Observers\VehicleLocalizationObserver;
use Karaev\Vehicle\Infrastructure\Observers\VehicleUrlRewriteObserver;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Karaev\Vehicle\Infrastructure\Observers\Component\SidebarInitializationObserver;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        'before_initialization_sidebar' => [
            SidebarInitializationObserver::class,
        ]
    ];

    public function boot()
    {
        parent::boot();

        Vehicle::observe([
            VehiclePropertyObserver::class,
            VehicleLocalizationObserver::class,
            VehicleImageObserver::class,
            VehicleUrlRewriteObserver::class,
        ]);
    }
}
