<?php

namespace Karaev\Booking\Domain\Api;

use Karaev\Booking\Domain\Api\Data\BookingDataInterface;
use Karaev\Vehicle\Domain\Api\Data\VehicleDataInterface;

interface BookingPriceCalculatorInterface
{
    public function execute(): int|float;

    public function getFinalPricePerDay(): null|int|float;
}
