<?php

namespace Karaev\Booking\Infrastructure\Observers\Component;

use Karaev\Admin\Infrastructure\Components\Sidebar\ElementMenu;

class SidebarInitializationObserver
{
    public function handle($event): void
    {
        $event->add(
            ElementMenu::make()
                ->setCode('booking')
                ->setTitle('Booking')
                ->setLink('admin.booking.index')
                ->setIconCss('c-brown-500 ti-clipboard')
                ->setSortOrder(30)
        );
    }
}
