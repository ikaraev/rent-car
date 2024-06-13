<?php

namespace Karaev\Vehicle\Infrastructure\Eloquent\Pagination;

use Karaev\Vehicle\Domain\Api\PaginatorInterface;
use Karaev\Vehicle\Domain\Api\VehicleRepositoryInterface;

class VehiclePaginator implements PaginatorInterface
{
    public function __construct(protected VehicleRepositoryInterface $vehicleRepository) {}

    public function paginate($searchCriteria)
    {
        return $this->vehicleRepository->getList($searchCriteria);
    }
}
