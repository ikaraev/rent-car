<?php

declare(strict_types=1);

namespace Karaev\Booking\Application\Handler\Booking;

use Karaev\Booking\Domain\Api\BookingRepositoryInterface;
use Karaev\Common\Domain\Api\FilterConvertorServiceInterface;

class FilterBookingHandler
{
    public function __construct(
        private BookingRepositoryInterface $bookingRepository,
        private FilterConvertorServiceInterface $filterConvertorService
    ) {}

    public function handler(array $params)
    {
        $filters = $this->filterConvertorService->convert($params);
        return $this->bookingRepository->getList($filters);
    }
}
