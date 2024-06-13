<?php

declare(strict_types=1);

namespace Karaev\Booking\Infrastructure\Services;

use DateTime;
use Karaev\Booking\Domain\Api\BookingPriceCalculatorInterface;
use Karaev\Vehicle\Domain\Api\Data\VehicleDataInterface;
use Karaev\Vehicle\Domain\Models\Vehicle;
use Karaev\Vehicle\Infrastructure\Eloquent\Model\Filter\DoubleRangeDatepickerFilter;

class BookingDiscountPriceService
{
    private array $filters = [];
    private VehicleDataInterface $vehicle;

    public function __construct(private BookingPriceCalculatorInterface $bookingPriceCalculator) {}

    public function setFilters(array $filters): self
    {
        $this->filters = $filters;
        return $this;
    }

    public function setVehicle(VehicleDataInterface $vehicle): self
    {
        $this->vehicle = $vehicle;
        return $this;
    }

    public function addBookingPrices()
    {
        $days = $this->determineBookDays();
        $bookingPriceCalculator = $this->bookingPriceCalculator->setDays($days)->setVehicle($this->vehicle);

        $this->vehicle->setData('booking', [
            'discount' => $bookingPriceCalculator->getFinalPricePerDay(),
            'total_price' => $bookingPriceCalculator->execute(),
            'days' => $days
        ]);
        return $this->vehicle;
    }

    /**
     * @return int
     * @throws \Exception
     */
    public function determineBookDays(): int
    {
        $filter = $this->extractDoubleRangeDatepickerFiler();

        $startDate = new DateTime($filter[DoubleRangeDatepickerFilter::class]['value']['startDate']);
        $finishDate = new DateTime($filter[DoubleRangeDatepickerFilter::class]['value']['endDate']);

        return $finishDate->diff($startDate)->d;
    }

    private function extractDoubleRangeDatepickerFiler()
    {
        $result = null;
        foreach ($this->filters as $key => $incomeFilter) {
            foreach ($incomeFilter as $class => $params) {
                if ($class === DoubleRangeDatepickerFilter::class) {
                    return  $incomeFilter;
                }
            }
        }

        return $result;
    }
}
