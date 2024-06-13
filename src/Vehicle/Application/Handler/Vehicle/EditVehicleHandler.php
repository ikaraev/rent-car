<?php

declare(strict_types=1);

namespace Karaev\Vehicle\Application\Handler\Vehicle;

use Karaev\Vehicle\Domain\Api\Data\VehicleDataInterface;
use Karaev\Vehicle\Domain\Api\VehicleRepositoryInterface;

final class EditVehicleHandler
{
    public function __construct(protected VehicleRepositoryInterface $vehicleRepository) {}

    public function handler(int $id): VehicleDataInterface
    {
        return $this->vehicleRepository->getById($id);
    }
}
