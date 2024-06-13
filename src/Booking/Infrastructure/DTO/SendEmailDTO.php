<?php

declare(strict_types=1);

namespace Karaev\Booking\Infrastructure\DTO;

use Karaev\Booking\Domain\Api\Data\BookingDataInterface;

class SendEmailDTO
{
    private BookingDataInterface $booking;
    private string $subject;

    public function __construct(array $data = null)
    {
        $this->subject = $data['subject'];
        $this->booking = $data['booking'];
    }

    public function setSubject(string $subject): self
    {
        $this->subject = $subject;

        return $this;
    }

    public function getSubject(): string
    {
        return $this->subject;
    }

    public function getBooking(): BookingDataInterface
    {
        return $this->booking;
    }

    public function setBooking(BookingDataInterface $booking): self
    {
        $this->booking = $booking;
        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
          'booking' => $this->getBooking(),
          'subject' => $this->getSubject()
        ];
    }
}
