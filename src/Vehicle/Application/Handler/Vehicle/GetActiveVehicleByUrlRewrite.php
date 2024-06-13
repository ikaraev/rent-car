<?php

declare(strict_types=1);

namespace Karaev\Vehicle\Application\Handler\Vehicle;

use Karaev\Vehicle\Domain\Api\Data\VehicleDataInterface;
use Karaev\Vehicle\Domain\Api\VehicleRepositoryInterface;
use Karaev\Vehicle\Domain\Api\VehicleUrlRewriteRepositoryInterface;
use Karaev\Vehicle\Application\Exception\VehicleNotFoundException;
use Karaev\Vehicle\Application\Exception\UrlRewriteNotFoundException;

final class GetActiveVehicleByUrlRewrite
{
    public function __construct(
        private VehicleUrlRewriteRepositoryInterface $vehicleUrlRewriteRepository,
        private VehicleRepositoryInterface $vehicleRepository
    ) {}

    public function handler(string $urlRewrite): VehicleDataInterface
    {
        $urlRewrite = $this->vehicleUrlRewriteRepository->getByUrl($urlRewrite);

        if (!$urlRewrite->getId()) {
            throw new UrlRewriteNotFoundException();
        }

        $vehicle = $this->vehicleRepository->getById($urlRewrite->getVehicleId());

        if (!$vehicle->isActive()) {
            throw new VehicleNotFoundException();
        }

        return $vehicle;
    }
}
