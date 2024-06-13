<?php

namespace Karaev\Booking\Application\Handler\Booking;

use Karaev\Booking\Domain\Api\Data\BookingDataInterface;
use Karaev\Booking\Domain\Api\BookingRepositoryInterface;

class SaveBookingHandler
{
    public function __construct(private BookingRepositoryInterface $bookingRepository) {}

    public function handler(BookingDataInterface $bookingData)
    {
        return $this->bookingRepository->save($bookingData);
    }
}
