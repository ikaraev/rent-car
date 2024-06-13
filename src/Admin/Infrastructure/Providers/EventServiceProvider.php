<?php

namespace Karaev\Admin\Infrastructure\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Karaev\Admin\Infrastructure\Eloquent\Model\Admin;
use Karaev\Admin\Infrastructure\Observers\AdminPasswordObserver;
use Karaev\Admin\Infrastructure\Observers\Component\SidebarInitializationObserver;

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

        Admin::observe([
            AdminPasswordObserver::class
        ]);
    }
}
