<?php

namespace Karaev\Vehicle\Domain\Api\Data;

interface VehicleDataInterface
{
    public const ID = 'id';
    public const RENT_PRICE = 'rent_price';
    public const FIRST_PERIOD_RENT_PRICE = 'first_period_discount_price';
    public const SECOND_PERIOD_RENT_PRICE = 'second_period_discount_price';
    public const IS_ACTIVE = 'is_active';

    public function getId(): int;

    public function setId(int $id);

    public function getRentPrice(): int|float;

    public function getFirstPeriodDiscountPrice(): int|float;

    public function getSecondPeriodDiscountPrice(): int|float;

    public function setRentPrice(int|float $rentPrice): self;

    public function isActive(): bool;
}
