<?php

declare(strict_types=1);

namespace Karaev\Admin\Infrastructure\Components\Sidebar;

use Inertia\Inertia;

class Initialization implements \Karaev\Admin\Infrastructure\Components\Initialization
{

    public function __construct(private Sidebar $sidebar) {}

    public function init(): void
    {
        event('before_initialization_sidebar', [$this->sidebar]);

        $this->sidebar->sorting();

        Inertia::share([
            'sidebar' => function() {
                return $this->sidebar->toArray();
            }
        ]);
    }
}
