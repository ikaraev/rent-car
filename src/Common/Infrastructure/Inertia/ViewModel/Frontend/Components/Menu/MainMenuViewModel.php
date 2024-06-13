<?php

namespace Karaev\Common\Infrastructure\Inertia\ViewModel\Frontend\Components\Menu;

use Inertia\Inertia;
use Karaev\Common\Infrastructure\Inertia\ViewModel\Frontend\Components\Initialization;

class MainMenuViewModel implements Initialization
{
    public const HOME_CODE = 'home';
    public const ABOUT_US_CODE = 'about-us';
    public const CONTACT_CODE = 'contact';

    private array $menu = [
        [
            'title' => 'Home',
            'code' => 'home',
            'route' => 'frontend.index',
            'is_active' => true
        ],
//        [
//            'title' => 'Rules',
//            'code' => 'rules',
//            'route' => 'frontend.rules',
//            'is_active' => false
//        ],
        [
            'title' => 'About',
            'code' => 'about-us',
            'route' => 'frontend.about-us',
            'is_active' => false
        ],
        [
            'title' => 'Contact',
            'code' => 'contact',
            'route' => 'frontend.contacts',
            'is_active' => false
        ]
    ];

    public function setActiveByCode(string $code)
    {
        foreach ($this->menu as $key => $menu) {
            $this->menu[$key]['is_active'] = false;

            if ($menu['code'] === $code) {
                $this->menu[$key]['is_active'] = true;
            }
        }
    }

    public function getMenu(): array
    {
        return $this->menu;
    }

    public function init(): void
    {
        Inertia::share([
            'menu' => function() {
                return $this->getMenu();
            }
        ]);
    }
}
