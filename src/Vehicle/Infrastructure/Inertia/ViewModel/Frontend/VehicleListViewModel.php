<?php

declare(strict_types=1);

namespace Karaev\Vehicle\Infrastructure\Inertia\ViewModel\Frontend;

use DateTime;
use Inertia\Inertia;
use Karaev\Booking\Infrastructure\Services\MassBookingDiscountPriceService;
use Karaev\Common\Infrastructure\Eloquent\Model\Filter\SearchFilter;
use Karaev\Common\Infrastructure\Inertia\ViewModel\Frontend\FrontendLayoutViewModel;
use Karaev\Vehicle\Domain\Models\Collection\VehicleCollection;
use Karaev\Vehicle\Domain\Models\Resource\GearBoxResourceOptions;
use Karaev\Vehicle\Infrastructure\Eloquent\Model\Filter\DoubleRangeDatepickerFilter;
use Karaev\Common\Infrastructure\Eloquent\Model\Filter\RangeFilter;
use Karaev\Common\Infrastructure\Eloquent\Model\Filter\SelectFilter;
use Karaev\Booking\Domain\Api\BookingPriceCalculatorInterface;

class VehicleListViewModel extends FrontendLayoutViewModel
{
    protected $vehicles;
    protected $incomeFilters;

    public function __construct(
        private BookingPriceCalculatorInterface $bookingPriceCalculator,
        private MassBookingDiscountPriceService $massBookingDiscountPriceService
    ) {
        parent::__construct();
    }

    public function setFilters(array $incomeFilters): self
    {
        $this->incomeFilters = $incomeFilters;
        return $this;
    }

    public function setVehicles(VehicleCollection $vehicles)
    {
        $this->vehicles = $vehicles;
        return $this;
    }

    public function render()
    {
        $this->massBookingDiscountPriceService
            ->setVehicleList($this->vehicles)
            ->setFilters($this->incomeFilters)->execute();
//        $this->calculateTotalPrices();

        return Inertia::render('Frontend/Index', [
            'vehicles' => $this->vehicles->toArray(),
            'filters' => $this->getFilters(),
            'pickUpDateFilter' => $this->buildPickUpDateFilter()
        ]);
    }

//    private function calculateTotalPrices()
//    {
//        $dateRangeFilter = $this->getFilterByClass(DoubleRangeDatepickerFilter::class);
//
//        if (!$dateRangeFilter) {
//            return;
//        }
//
//        $dateRangeFilterParams = $dateRangeFilter[DoubleRangeDatepickerFilter::class];
//
//        $startDateTime = new DateTime($dateRangeFilterParams['value']['startDate']);
//        $endDateTime = new DateTime($dateRangeFilterParams['value']['endDate']);
//
//        $days = $startDateTime->diff($endDateTime)->days + 1;
//
//        foreach ($this->vehicles->getItems() as $key => $vehicle) {
//            $bookingPrice = $this->bookingPriceCalculator
//                ->setVehicle($vehicle)
//                ->setDays($days);
//
//            $vehicle->total_price = $bookingPrice->execute();
//
//            if ($vehicle->getRentPrice() > $bookingPrice->getFinalPricePerDay()) {
//                $vehicle->discount = $bookingPrice->getFinalPricePerDay();
//            }
//        }
//    }

    public function getFilters(): array
    {
        $filters = [
            new SearchFilter('name', 'Name', reference: 'properties'),
            new SelectFilter('gear_box', 'Gear Box', (new GearBoxResourceOptions())->getOptions(), reference: 'properties'),
            new RangeFilter('rent_price', 'Cost per day, $', reference: 'properties'),
        ];

        foreach ($filters as $filter) {
            $filter->setValue($this->extractFilterValue($filter));
        }

        return $filters;
    }

    /**
     * @return DoubleRangeDatepickerFilter
     */
    public function buildPickUpDateFilter(): DoubleRangeDatepickerFilter
    {
        $value = $this->extractDataPickerValues();

        return new DoubleRangeDatepickerFilter(
            'booking-double-range-datepicker',
            'Pick-up date - Drop-off date',
            value: $value,
            reference: 'booking'
        );
    }

    /**
     * @return array
     */
    private function extractDataPickerValues(): array
    {
        $value = [];
        foreach ($this->incomeFilters as $key => $filter) {
            if (isset($filter[DoubleRangeDatepickerFilter::class])) {
                return (array)$filter[DoubleRangeDatepickerFilter::class]['value'];
            }
        }

        return $value;
    }

    private function extractFilterValue($filter): mixed
    {
        foreach ($this->incomeFilters as $key => $incomeFilter) {
            foreach ($incomeFilter as $class => $params) {
                if ($params['name'] === $filter->getName() && $class === get_class($filter)) {
                    return $params['value'];
                }
            }
        }

        return null;
    }
}
