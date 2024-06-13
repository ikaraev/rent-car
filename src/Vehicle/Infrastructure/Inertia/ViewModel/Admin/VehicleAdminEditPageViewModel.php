<?php

namespace Karaev\Vehicle\Infrastructure\Inertia\ViewModel\Admin;

use Inertia\Inertia;
use Karaev\Vehicle\Domain\Models\Vehicle;

class VehicleAdminEditPageViewModel extends AbstractAdminFormPageViewModel
{
    protected Vehicle $vehicle;

    public function setVehicle(Vehicle $vehicle): self
    {
        $this->vehicle = $vehicle;

        return $this;
    }

    public function render()
    {
        return Inertia::render('Admin/Cars/Edit', [
            'schema' => $this->schema(),
            'entity' => $this->vehicle->getData()
        ]);
    }
}
