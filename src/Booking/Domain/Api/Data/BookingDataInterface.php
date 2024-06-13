<?php

namespace Karaev\Booking\Domain\Api\Data;

interface BookingDataInterface
{
    public const VEHICLE_ID = 'vehicle_id';
    public const START_DATE = 'start';
    public const FINISH_DATE = 'finish';
    public const STATUS = 'status';

    public const PROPERTIES = 'properties';
    public const CONTACT_FORM = 'contactForm';

    public function getProperties(): array|BookingPropertiesInterface;

    public function setProperties(BookingPropertiesInterface $bookingProperties): self;

    public function getContactForm(): array|BookingContactFormDataInterface;

    public function setContactForm(BookingContactFormDataInterface $bookingContactForm): self;

    public function getVehicleId(): int;

    public function setVehicleId(int $vehicleId): self;

    public function getStartDate(): string;

    public function setStartDate(string $startDate): self;

    public function getFinishDate(): string;

    public function setFinishDate(string $finishDate): self;

    public function getStatus(): string;

    public function setStatus(string $status): self;
}
