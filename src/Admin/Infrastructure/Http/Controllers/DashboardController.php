<?php

namespace Karaev\Admin\Infrastructure\Http\Controllers;

use Karaev\Admin\Infrastructure\Inertia\ViewModel\DashboardViewModel;

class DashboardController
{
    public function execute(DashboardViewModel $dashboardViewModel)
    {
        return $dashboardViewModel->render();
    }
}
