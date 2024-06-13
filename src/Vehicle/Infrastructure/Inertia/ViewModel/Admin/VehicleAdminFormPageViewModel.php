<?php

namespace Karaev\Vehicle\Infrastructure\Inertia\ViewModel\Admin;

use Inertia\Inertia;

class VehicleAdminFormPageViewModel extends AbstractAdminFormPageViewModel
{
    public function render()
    {
        return Inertia::render('Admin/Cars/Edit', [
            'schema' => $this->schema(),
        ]);
    }
}
