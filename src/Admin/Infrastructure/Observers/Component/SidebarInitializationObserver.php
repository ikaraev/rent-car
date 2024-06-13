<?php

namespace Karaev\Admin\Infrastructure\Observers\Component;

use Karaev\Admin\Infrastructure\Components\Sidebar\ElementMenu;

class SidebarInitializationObserver
{
    public function handle($event): void
    {
        $event->add(
            ElementMenu::make()
                ->setCode('dashboard')
                ->setLink('admin.dashboard')
                ->setTitle('Dashboard')
                ->setIconCss('c-blue-500 ti-home')
                ->setSortOrder(10)
        );
    }
}
