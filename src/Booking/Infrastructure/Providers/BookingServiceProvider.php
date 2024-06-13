<?php

namespace Karaev\Booking\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;
use Karaev\Admin\Infrastructure\Components\Sidebar\ElementMenu;
use Karaev\Admin\Infrastructure\Components\Sidebar\Sidebar;

class BookingServiceProvider extends ServiceProvider
{
    public $bindings = [
        \Karaev\Booking\Domain\Api\BookingRepositoryInterface::class => \Karaev\Booking\Infrastructure\Eloquent\Repository\BookingRepository::class,
        \Karaev\Booking\Domain\Api\BookingPriceCalculatorInterface::class => \Karaev\Booking\Application\Handler\Price\BookingPriceCalculator::class
    ];

    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'booking');
    }
}
