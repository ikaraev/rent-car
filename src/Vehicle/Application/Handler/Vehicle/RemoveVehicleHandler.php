<?php

namespace Karaev\Vehicle\Application\Handler\Vehicle;

use Karaev\Vehicle\Domain\Api\VehicleRepositoryInterface;

final class RemoveVehicleHandler
{
    public function __construct(protected VehicleRepositoryInterface $vehicleRepository) {}

    public function handler(int $id): bool
    {
        return $this->vehicleRepository->deleteById($id);
    }
}
