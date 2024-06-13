<?php

namespace Karaev\Admin\Infrastructure\Inertia\ViewModel;

use Inertia\Inertia;
abstract class AdminLayoutViewModel
{
    private array $components = [
        \Karaev\Admin\Infrastructure\Components\Sidebar\Initialization::class
    ];

    public function __construct()
    {
        $this->init();
    }

    public function init(): void
    {
        Inertia::share([
            'errors' => session()->get('errors') ? session()->get('errors')->getBag('default')->getMessages() : []
        ]);

        foreach ($this->components as $component) {
            app($component)->init();
        }
    }

    abstract public function render();
}
