<?php

namespace Karaev\Booking\Application\Handler\Price;

use DateTime;
use Karaev\Booking\Domain\Api\Data\BookingDataInterface;
use Karaev\Vehicle\Domain\Api\Data\VehicleDataInterface;
use Karaev\Booking\Domain\Api\BookingPriceCalculatorInterface;

class BookingPriceCalculator implements BookingPriceCalculatorInterface
{
    private ?int $days = null;
    private BookingDataInterface $bookingData;
    private VehicleDataInterface $vehicleData;

    public function setDays(int $days): self
    {
        $this->days = $days;
        return $this;
    }

    public function setBooking(BookingDataInterface $bookingData): BookingPriceCalculatorInterface
    {
        $this->bookingData = $bookingData;

        return $this;
    }

    public function setVehicle(VehicleDataInterface $vehicleData): BookingPriceCalculatorInterface
    {
        $this->vehicleData = $vehicleData;
        return $this;
    }

    public function execute(): int|float
    {
        $totalDays = $this->calculateTotalDays();

        return $this->totalPriceCalculator($totalDays);
    }

    /**
     * @return int
     * @throws \Exception
     */
    protected function calculateTotalDays(): int
    {
        if ($this->days) {
            return $this->days;
        }

        $startDate = new DateTime($this->bookingData->getStartDate());
        $finishDate = new DateTime($this->bookingData->getFinishDate());

        $result = $finishDate->diff($startDate)->d;
        return $result;
    }

    /**
     * @param int $days
     *
     * @return int|float
     */
    private function totalPriceCalculator(int $days): int|float
    {
        $pricePerDay = $this->getFinalPricePerDay() ?: $this->vehicleData->getRentPrice();

        return $days * $pricePerDay;
    }

    public function getFinalPricePerDay(): null|float|int
    {
        $pricePerDay = null;

        $days = $this->calculateTotalDays();

        if ($days > 3 && $days < 8) {
            $pricePerDay = $this->vehicleData->getFirstPeriodDiscountPrice();
        }

        if ($days > 8) {
            $pricePerDay = $this->vehicleData->getSecondPeriodDiscountPrice();
        }

        return $pricePerDay;
    }
}
