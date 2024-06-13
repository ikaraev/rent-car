<?php

declare(strict_types=1);

namespace Karaev\Booking\Application\Handler\Booking;

use Karaev\Booking\Domain\Api\BookingPriceCalculatorInterface;
use Karaev\Booking\Domain\Api\Data\BookingDataInterface;
use Karaev\Vehicle\Domain\Api\VehicleRepositoryInterface;

class ExecuteBookingHandler
{
    public function __construct(
        private SaveBookingHandler $saveBookingHandler,
        private BookingPriceCalculatorInterface $bookingPriceCalculator,
        private VehicleRepositoryInterface $vehicleRepository
    ) {}

    public function handler(BookingDataInterface $bookingData)
    {
        $vehicleDomain = $this->vehicleRepository->getById($bookingData->getVehicleId());

        $bookingPriceCalculator = $this->bookingPriceCalculator
            ->setBooking($bookingData)
            ->setVehicle($vehicleDomain);

        $bookingData->getProperties()
            ->setDayPrice($bookingPriceCalculator->getFinalPricePerDay())
            ->setTotalPrice($bookingPriceCalculator->execute());

        return $this->saveBookingHandler->handler($bookingData);
    }
}
