<?php

namespace Karaev\Booking\Infrastructure\Inertia\ViewModel\Admin;

use Inertia\Inertia;
use Inertia\Response;
use Karaev\Booking\Domain\Api\Data\BookingDataInterface;

class BookingAdminEditPageViewModel extends AbstractAdminFormPageViewModel
{
    private BookingDataInterface $booking;

    public function setBooking(BookingDataInterface $booking): self
    {
        $this->booking = $booking;
        return $this;
    }

    /**
     * @return Response
     */
    public function render(): Response
    {
        return Inertia::render('Admin/Booking/Edit', [
            'schema' => $this->schema(),
            'entity' => $this->booking->getData()
        ]);
    }
}
