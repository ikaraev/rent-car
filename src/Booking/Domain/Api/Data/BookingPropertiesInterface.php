<?php

namespace Karaev\Booking\Domain\Api\Data;

interface BookingPropertiesInterface
{
    public const DAY_PRICE = 'day_price';
    public const TOTAL_PRICE = 'total_price';

    public function getDayPrice(): int|float;

    public function setDayPrice(int|float $price): self;

    public function getTotalPrice(): int|float;

    public function setTotalPrice(int|float $price): self;
}
