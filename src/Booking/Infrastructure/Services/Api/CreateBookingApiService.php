<?php

declare(strict_types=1);

namespace Karaev\Booking\Infrastructure\Services\Api;

use Karaev\Booking\Domain\Api\BookingRepositoryInterface;
use Karaev\Booking\Domain\Models\Booking as Domain;
use Karaev\Booking\Application\Exception\BookingIsNotCreatedException;
use Karaev\Booking\Application\Handler\Booking\ExecuteBookingHandler;
use Karaev\Booking\Infrastructure\Eloquent\Model\Filter\BookingDoubleRangeFilter;
use Karaev\Common\Domain\Api\SearchCriteriaInterface;
use Karaev\Common\Infrastructure\Eloquent\Model\Filter\InputFilter;

class CreateBookingApiService
{
    private Domain $booking;

    public function __construct(
        private ExecuteBookingHandler      $executeBookingHandler,
        private BookingRepositoryInterface $bookingRepository,
        private SearchCriteriaInterface $searchCriteria
    ) {}

    public function setBookingDomain(Domain $booking): self
    {
        $this->booking = $booking;

        return $this;
    }

    /**
     * @return mixed
     * @throws BookingIsNotCreatedException
     */
    public function execute()
    {
        $this->validation($this->booking);
        $booking = $this->executeBookingHandler->handler($this->booking);

        if (!$booking->getId()) {
            throw new BookingIsNotCreatedException();
        }

        event('api_booking_created_success', [$booking]);

        return $booking;
    }

    protected function validation(Domain $booking)
    {
        $searchCriteria = $this->searchCriteria;

        $searchCriteria->addFilter(new BookingDoubleRangeFilter(
            'start, finish',
            value: ['start' => $booking->getStartDate(), 'finish' => $booking->getFinishDate()]
        ));

        $searchCriteria->addFilter(new InputFilter(
            'vehicle_id',
            value: $booking->getVehicleId(),
        ));

        $list = $this->bookingRepository->getList($searchCriteria);

        if (count($list->getItems())) {
            throw new \Exception('Vehicle is not available');
        }
    }
}
