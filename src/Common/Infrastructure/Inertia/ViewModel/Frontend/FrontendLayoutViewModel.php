<?php

namespace Karaev\Common\Infrastructure\Inertia\ViewModel\Frontend;

use Karaev\Common\Infrastructure\Inertia\InertiaInterface;

abstract class FrontendLayoutViewModel implements InertiaInterface
{
    private array $components = [
        \Karaev\Common\Infrastructure\Inertia\ViewModel\Frontend\Components\Menu\MainMenuViewModel::class
    ];

    public function __construct()
    {
        $this->init();
    }

    public function init(): void
    {
        foreach ($this->components as $component) {
            app($component)->init();
        }
    }
}
