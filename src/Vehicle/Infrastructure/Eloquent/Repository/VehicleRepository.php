<?php

namespace Karaev\Vehicle\Infrastructure\Eloquent\Repository;

use Karaev\Vehicle\Domain\Api\Data\VehicleDataInterface;
use Karaev\Common\Domain\Api\SearchCriteriaInterface;
use Karaev\Vehicle\Domain\Api\VehicleRepositoryInterface;
use Karaev\Vehicle\Infrastructure\Eloquent\Model\Vehicle;
use Karaev\Common\Domain\Models\Collection\CollectionInterface;
use Karaev\Vehicle\Infrastructure\Eloquent\Transformer\VehicleTransformer;
use Karaev\Vehicle\Infrastructure\Services\VehicleFilterManager;

class VehicleRepository implements VehicleRepositoryInterface
{
    public const PER_PAGE = 16;

    public function __construct(protected VehicleTransformer $vehicleTransformer) {}

    public function getById(int $id): VehicleDataInterface
    {
        $eloquentModel = Vehicle::with([
            'localizations' => fn($query) => $query->where('localization_code', app()->getLocale()),
            'properties',
            'images',
            'urlRewrite'
        ])->findOrNew($id);

        return $this->vehicleTransformer->entityToDomain($eloquentModel);
    }

    public function getFilteredItem(SearchCriteriaInterface $searchCriteria)
    {
        $entity = $this->getList($searchCriteria)->getFirstItem();
        $entity->setLocale($searchCriteria->getLocale());

        return $entity;
    }

    public function getList(SearchCriteriaInterface $searchCriteria): CollectionInterface
    {
        $vehicleFilterManager = new VehicleFilterManager();

        return $vehicleFilterManager->applySearchCriteriaFilter($searchCriteria);
    }

    public function getSimplePagination(?int $perPage = null)
    {
        return Vehicle::with([
            'localizations' => fn($query) => $query->where('localization_code', app()->getLocale()),
            'properties'
        ])->simplePaginate($perPage ?? self::PER_PAGE);
    }

    public function save(VehicleDataInterface $vehicleData)
    {
        $vehicle = $this->vehicleTransformer->domainToEntity($vehicleData);
        $vehicle->save();

        return $this->vehicleTransformer->entityToDomain($vehicle);
    }

    public function delete(VehicleDataInterface $vehicleData): bool
    {
        // TODO: Implement delete() method.
    }

    public function deleteById(int $id): bool
    {
        $vehicle = Vehicle::find($id);

        return $vehicle->delete();
    }
}
