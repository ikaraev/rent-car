<?php

namespace Karaev\Admin\Infrastructure\Inertia\ViewModel;

use Inertia\Inertia;

class DashboardViewModel extends AdminLayoutViewModel
{

    public function render()
    {
        return Inertia::render('Admin/Dashboard');
    }
}
