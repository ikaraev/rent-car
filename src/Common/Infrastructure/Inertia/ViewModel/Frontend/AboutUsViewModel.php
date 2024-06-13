<?php

namespace Karaev\Common\Infrastructure\Inertia\ViewModel\Frontend;

use Inertia\Inertia;
use Karaev\Common\Infrastructure\Inertia\ViewModel\Frontend\Components\Menu\MainMenuViewModel;

class AboutUsViewModel extends FrontendLayoutViewModel
{
    public function __construct(MainMenuViewModel $menuViewModel)
    {
        $menuViewModel->setActiveByCode(MainMenuViewModel::ABOUT_US_CODE);

        parent::__construct();
    }

    public function render()
    {
        return Inertia::render('Frontend/AboutUs');
    }
}
