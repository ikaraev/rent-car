<?php

declare(strict_types=1);

namespace Karaev\Vehicle\Application\Handler\Vehicle;

use Karaev\Vehicle\Domain\Api\VehicleRepositoryInterface;
use Karaev\Common\Domain\Api\FilterConvertorServiceInterface;

final class FilterVehicleHandler
{
    public function __construct(
        protected VehicleRepositoryInterface $vehicleRepository,
        protected FilterConvertorServiceInterface $filterGenerationService
    ) {}

    public function handler(array $params)
    {
        $filters = $this->filterGenerationService->convert($params);
        return $this->vehicleRepository->getList($filters);
    }
}
