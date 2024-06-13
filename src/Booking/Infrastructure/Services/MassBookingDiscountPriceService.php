<?php

namespace Karaev\Booking\Infrastructure\Services;

use Karaev\Vehicle\Domain\Models\Collection\VehicleCollection;

class MassBookingDiscountPriceService
{
    private $vehicleList;
    private array $filters;

    public function __construct(private BookingDiscountPriceService $bookingDiscountPriceService) {}

    public function setVehicleList(VehicleCollection $vehicleList): self
    {
        $this->vehicleList = $vehicleList;
        return $this;
    }

    public function setFilters(array $filters): self
    {
        $this->filters = $filters;
        return $this;
    }

    public function execute()
    {
        foreach ($this->vehicleList->getItems() as $vehicle) {
            $this->bookingDiscountPriceService
                ->setFilters($this->filters)
                ->setVehicle($vehicle)
                ->addBookingPrices();
        }

        return $this->vehicleList;
    }
}
