<?php

namespace Karaev\Booking\Domain\Api;

use Karaev\Common\Domain\Api\SearchCriteriaInterface;
use Karaev\Booking\Domain\Api\Data\BookingDataInterface;
use Karaev\Common\Domain\Models\Collection\CollectionInterface;

interface BookingRepositoryInterface
{
    public function getById(int $bookingId): BookingDataInterface;

    public function getList(SearchCriteriaInterface $searchCriteria): CollectionInterface;

    public function save(BookingDataInterface $booking);

    public function deleteById(int $bookingId): bool;
}
