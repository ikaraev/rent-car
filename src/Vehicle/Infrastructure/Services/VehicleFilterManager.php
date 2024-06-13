<?php

namespace Karaev\Vehicle\Infrastructure\Services;

use Karaev\Common\Domain\Api\SearchCriteriaInterface;
use Karaev\Common\Infrastructure\Eloquent\Model\Filter\EloquentFilterInterface;
use Karaev\Vehicle\Domain\Models\Collection\VehicleCollection;
use Karaev\Vehicle\Infrastructure\Eloquent\Model\Filter\DoubleRangeDatepickerFilter;
use Karaev\Vehicle\Infrastructure\Eloquent\Model\Vehicle;
use Karaev\Vehicle\Infrastructure\Eloquent\Transformer\VehicleTransformer;

class VehicleFilterManager
{
    public function applySearchCriteriaFilter(SearchCriteriaInterface $searchCriteria)
    {
        $vehicle = Vehicle::with([
            'localizations' => fn($query) => $query->where('localization_code', $searchCriteria->getLocale()),
            'images'
        ]);

//        if ($searchCriteria->getSelect()) {
//            $vehicle->select($searchCriteria->getSelect());
//        }

        $vehicle->leftJoin('vehicle_properties', 'vehicle_properties.vehicle_id', '=', 'vehicles.id');
        $vehicle->leftJoin('vehicle_url_rewrites', 'vehicle_url_rewrites.vehicle_id', '=', 'vehicles.id');

        foreach ($searchCriteria->getFilters() as $filter) {
            $filter->setReference($this->defineReferenceTable($filter))
                ->apply($vehicle);
        }

//        if (isset($searchCriteria->getRelationFilters()['booking'])) {
//            $vehicle->whereNotIn('vehicle_properties.id', function ($query) use ($searchCriteria) {
//                foreach ($searchCriteria->getRelationFilters()['booking'] as $filter) {
//                    if ($filter->getField() === DoubleRangeDatepickerFilter::FIELD) {
//                        /** @var $filter EloquentFilterInterface */
//                        $filter->apply($query);
//                    }
//                }
//            });
//        }

        if ($searchCriteria->getOrder()) {
            $vehicle->orderBy($searchCriteria->getOrder()['column'], $searchCriteria->getOrder()['direction']);
        }

        $domainCollection = new VehicleCollection();

        $collection = $vehicle->simplePaginate(16);

        $vehicleTransformer = new VehicleTransformer();

        foreach ($collection as $item) {
            $domainCollection->addItem($vehicleTransformer->entityToDomain($item));
        }

        $this->preparePaginationValues($collection, $domainCollection);

        return $domainCollection;
    }


    protected function defineReferenceTable($filter)
    {
        return match($filter->getReference()) {
            'properties' => 'vehicle_properties',
            'urlRewrite' => 'vehicle_url_rewrites',
            default => $filter->getReference()
        };
    }

    private function preparePaginationValues($eloquentCollection, $domainCollection)
    {
        $domainCollection->next_page_url = $eloquentCollection?->withQueryString()->nextPageUrl();
        $domainCollection->prev_page_url = $eloquentCollection?->withQueryString()->previousPageUrl();
    }
}
