<?php

namespace Karaev\Vehicle\Application\Handler\Vehicle;

use Karaev\Vehicle\Domain\Api\VehicleRepositoryInterface;
use Karaev\Vehicle\Domain\Api\Data\VehicleDataInterface;

final class SaveVehicleHandler
{
    public function __construct(protected VehicleRepositoryInterface $vehicleRepository) {}

    public function handler(VehicleDataInterface $vehicleData)
    {
        $this->vehicleRepository->save($vehicleData);
    }
}
