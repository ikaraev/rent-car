<?php

namespace Karaev\Booking\Infrastructure\Inertia\ViewModel\Admin;

use Inertia\Inertia;

class BookingAdminFormPageViewModel extends AbstractAdminFormPageViewModel
{

    public function render()
    {
        return Inertia::render('Admin/Booking/Form', [
            'schema' => $this->schema()
        ]);
    }
}
