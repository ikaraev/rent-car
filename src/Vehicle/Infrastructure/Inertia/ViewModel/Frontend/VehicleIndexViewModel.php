<?php

declare(strict_types=1);

namespace Karaev\Vehicle\Infrastructure\Inertia\ViewModel\Frontend;

use Inertia\Inertia;
use Inertia\Response;
use Karaev\Common\Infrastructure\Inertia\InertiaInterface;
use Karaev\Vehicle\Domain\Api\Data\VehicleDataInterface;

class VehicleIndexViewModel extends VehicleListViewModel
{
    private VehicleDataInterface $vehicle;

    public function setOpenedVehicle(VehicleDataInterface $vehicle): self
    {
        $this->vehicle = $vehicle;
        return $this;
    }

    public function render(): Response
    {
        return Inertia::render('Frontend/Index', [
            'vehicles' => $this->vehicles->toArray(),
            'filters' => $this->getFilters(),
            'openedVehicle' => $this->vehicle->toArray(),
            'isVehicleOpened' => true,
            'pickUpDateFilter' => $this->buildPickUpDateFilter()
        ]);
    }
}
