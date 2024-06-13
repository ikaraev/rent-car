<?php

declare(strict_types=1);

namespace Karaev\Vehicle\Infrastructure\Observers\Component;

use Karaev\Admin\Infrastructure\Components\Sidebar\ElementMenu;

class SidebarInitializationObserver
{
    public function handle($event): void
    {
        $event->add(
            ElementMenu::make()
                ->setCode('car')
                ->setLink('admin.car.index')
                ->setTitle('Cars')
                ->setIconCss('c-brown-500 ti-car')
                ->setSortOrder(20)
        );
    }
}
