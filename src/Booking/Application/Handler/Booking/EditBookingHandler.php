<?php

namespace Karaev\Booking\Application\Handler\Booking;

use Karaev\Booking\Domain\Api\BookingRepositoryInterface;
use Karaev\Booking\Domain\Api\Data\BookingDataInterface;

class EditBookingHandler
{
    /**
     * @param BookingRepositoryInterface $bookingRepository
     */
    public function __construct(private BookingRepositoryInterface $bookingRepository) {}

    /**
     * @param int $id
     * @return BookingDataInterface
     */
    public function handler(int $id): BookingDataInterface
    {
        return $this->bookingRepository->getById($id);
    }
}
