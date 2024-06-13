<?php

namespace Karaev\Vehicle\Domain\Api;

use Karaev\Common\Domain\Api\SearchCriteriaInterface;
use Karaev\Vehicle\Domain\Api\Data\VehicleDataInterface;
use Karaev\Common\Domain\Models\Collection\CollectionInterface;

interface VehicleRepositoryInterface
{
    public function getById(int $id): VehicleDataInterface;

    public function getList(SearchCriteriaInterface $searchCriteria): CollectionInterface;

    public function save(VehicleDataInterface $vehicleData);

    public function getSimplePagination(?int $perPage = null);

    public function delete(VehicleDataInterface $vehicleData): bool;

    public function deleteById(int $id): bool;
}
