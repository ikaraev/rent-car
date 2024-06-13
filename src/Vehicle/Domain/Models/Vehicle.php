<?php

declare(strict_types=1);

namespace Karaev\Vehicle\Domain\Models;

use Karaev\Common\Domain\Models\AbstractModel;
use Karaev\Vehicle\Domain\Api\Data\VehicleDataInterface;
use Karaev\Common\Domain\Api\LocalizableInterface;

final class Vehicle extends AbstractModel implements VehicleDataInterface, LocalizableInterface
{
    public function getRentPrice(): int|float
    {
        return $this->getData(self::RENT_PRICE);
    }

    public function setRentPrice(float|int $rentPrice): VehicleDataInterface
    {
        $this->setData(self::RENT_PRICE, $rentPrice);

        return $this;
    }

    public function isActive(): bool
    {
        return (bool)$this->getData(self::IS_ACTIVE);
    }

    public function getLocale(): ?string
    {
        return $this->getData('locale');
    }

    public function setLocale(string $locale): LocalizableInterface
    {
        $this->setData('locale', $locale);

        return $this;
    }

    public function getFirstPeriodDiscountPrice(): int|float
    {
        return $this->getData(self::FIRST_PERIOD_RENT_PRICE);
    }

    public function getSecondPeriodDiscountPrice(): int|float
    {
        return $this->getData(self::SECOND_PERIOD_RENT_PRICE);
    }
}
