<?php

namespace Karaev\Booking\Domain\Models;

use Karaev\Common\Domain\Models\AbstractModel;
use Karaev\Booking\Domain\Api\Data\BookingPropertiesInterface;

class BookingProperties extends AbstractModel implements BookingPropertiesInterface
{
    public function getTotalPrice(): int|float
    {
        return $this->getData(self::TOTAL_PRICE);
    }

    public function setTotalPrice(float|int $price): BookingPropertiesInterface
    {
        $this->setData(self::TOTAL_PRICE, $price);
        return $this;
    }

    public function getDayPrice(): int|float
    {
        return $this->getData(self::DAY_PRICE);
    }

    public function setDayPrice(float|int $price): BookingPropertiesInterface
    {
        $this->setData(self::DAY_PRICE, $price);
        return $this;
    }
}
