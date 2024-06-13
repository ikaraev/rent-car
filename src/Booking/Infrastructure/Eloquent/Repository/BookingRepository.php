<?php

declare(strict_types=1);

namespace Karaev\Booking\Infrastructure\Eloquent\Repository;

use Karaev\Booking\Domain\Api\Data\BookingDataInterface;
use Karaev\Booking\Domain\Api\BookingRepositoryInterface;
use Karaev\Booking\Domain\Models\Collection\BookingCollection;
use Karaev\Booking\Infrastructure\Eloquent\Model\Booking;
use Karaev\Booking\Infrastructure\Eloquent\Transformer\BookingTransformer;
use Karaev\Common\Domain\Api\SearchCriteriaInterface;
use Karaev\Common\Domain\Models\Collection\CollectionInterface;

class BookingRepository implements BookingRepositoryInterface
{
    public const PER_PAGE = 16;

    public function __construct(private BookingTransformer $bookingTransformer) {}

    public function getById(int $bookingId): BookingDataInterface
    {
        $eloquentModel = Booking::with([
            'properties',
            'contactForm'
        ])->findOrNew($bookingId);

        return $this->bookingTransformer->entityToDomain($eloquentModel);
    }

    public function getPagination(SearchCriteriaInterface $searchCriteria): CollectionInterface
    {
        $eloquentCollection = Booking::with([
            'properties'
        ]);

        foreach ($searchCriteria->getFilters() as $searchFilter) {
            $searchFilter->apply($eloquentCollection);
        }

        if (isset($searchCriteria->getRelationFilters()['properties'])) {
            $eloquentCollection->whereHas('properties', function ($query) use ($searchCriteria) {
                $searchableAttributes = $query->getModel()->getAttributeList();

                foreach ($searchCriteria->getRelationFilters()['properties'] as $filter) {
                    if (in_array($filter->getName(), $searchableAttributes)) {
                        /** @var $filter \Karaev\Common\Infrastructure\Eloquent\Model\Filter\EloquentFilterInterface */
                        $filter->apply($query);
                    }
                }
            });
        }

        $eloquentCollection->simplePaginate($filter['perPage'] ?? self::PER_PAGE);

        $domainCollection = new BookingCollection();

        foreach ($eloquentCollection as $item) {
            $domainCollection->addItem($this->bookingTransformer->entityToDomain($item));
        }

        $this->preparePaginationValues($eloquentCollection, $domainCollection);

        return $domainCollection;
    }

    public function getList(SearchCriteriaInterface $searchCriteria): CollectionInterface
    {
        $eloquentCollection = Booking::with([
            'properties'
        ]);

        foreach ($searchCriteria->getFilters() as $searchFilter) {
            $searchFilter->apply($eloquentCollection);
        }

        if (isset($searchCriteria->getRelationFilters()['properties'])) {
            $eloquentCollection->whereHas('properties', function ($query) use ($searchCriteria) {
                $searchableAttributes = $query->getModel()->getAttributeList();

                foreach ($searchCriteria->getRelationFilters()['properties'] as $filter) {
                    if (in_array($filter->getName(), $searchableAttributes)) {
                        /** @var $filter \Karaev\Common\Infrastructure\Eloquent\Model\Filter\EloquentFilterInterface */
                        $filter->apply($query);
                    }
                }
            });
        }

        $domainCollection = new BookingCollection();

        foreach ($eloquentCollection->get() as $item) {
            $domainCollection->addItem($this->bookingTransformer->entityToDomain($item));
        }

        return $domainCollection;
    }

    public function save(BookingDataInterface $bookingData)
    {
        $booking = $this->bookingTransformer->domainToEntity($bookingData);
        $booking->save();

        return $this->bookingTransformer->entityToDomain($booking);
    }

    public function deleteById(int $bookingId): bool
    {
        // TODO: Implement deleteById() method.
    }

    private function preparePaginationValues($eloquentCollection, $domainCollection)
    {
        $domainCollection->next_page_url = $eloquentCollection->nextPageUrl();
        $domainCollection->prev_page_url = $eloquentCollection->previousPageUrl();
    }
}
