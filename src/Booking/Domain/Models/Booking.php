<?php

declare(strict_types=1);

namespace Karaev\Booking\Domain\Models;

use Karaev\Booking\Domain\Api\Data\BookingContactFormDataInterface;
use Karaev\Booking\Domain\Api\Data\BookingPropertiesInterface;
use Karaev\Common\Domain\Models\AbstractModel;
use Karaev\Booking\Domain\Api\Data\BookingDataInterface;

class Booking extends AbstractModel implements BookingDataInterface
{
    public function getProperties(): array|BookingPropertiesInterface
    {
        return $this->getData(self::PROPERTIES);
    }

    public function setProperties(BookingPropertiesInterface $bookingProperties): BookingDataInterface
    {
        $this->setData(self::PROPERTIES, $bookingProperties);

        return $this;
    }

    public function getContactForm(): array|BookingContactFormDataInterface
    {
        return $this->getData(self::CONTACT_FORM);
    }

    public function setContactForm(BookingContactFormDataInterface $bookingContactForm): BookingDataInterface
    {
        $this->setData(self::CONTACT_FORM, $bookingContactForm);

        return $this;
    }

    public function getVehicleId(): int
    {
        return $this->getData(self::VEHICLE_ID);
    }

    public function setVehicleId(int $vehicleId): BookingDataInterface
    {
        $this->setData(self::VEHICLE_ID, $vehicleId);
        return $this;
    }

    public function getStartDate(): string
    {
        return $this->getData(self::START_DATE);
    }

    public function setStartDate(string $startDate): BookingDataInterface
    {
        $this->setData(self::START_DATE, $startDate);
        return $this;
    }

    public function getFinishDate(): string
    {
        return $this->getData(self::FINISH_DATE);
    }

    public function setFinishDate(string $finishDate): BookingDataInterface
    {
        $this->setData(self::FINISH_DATE, $finishDate);
        return $this;
    }

    public function getStatus(): string
    {
        return $this->getData(self::STATUS);
    }

    public function setStatus(string $status): BookingDataInterface
    {
        $this->setData(self::STATUS, $status);
        return $this;
    }

    public function getTotalPrice(): int|float
    {
        return $this->getData(self::TOTAL_PRICE);
    }

    public function setTotalPrice(int|float $price): BookingDataInterface
    {
        $this->setData(self::TOTAL_PRICE, $price);

        return $this;
    }
}
