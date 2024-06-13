<?php

declare(strict_types=1);

namespace Karaev\Booking\Infrastructure\Observers;

use Karaev\Booking\Infrastructure\Eloquent\Model\Booking;
use Karaev\Booking\Infrastructure\Eloquent\Model\BookingProperty;

class BookingPropertyObserver
{
    public function saving(Booking $booking)
    {
        $property = $booking->properties ?? new BookingProperty();
        foreach ($property->getAttributeList() as $attribute) {
            if (array_key_exists($attribute, $booking->getAttributes())) {
                $property->{$attribute} = $booking->getAttribute($attribute);
                $booking->offsetUnset($attribute);
            }
        }
        $booking->setRelation('properties', $property);
    }

    public function saved(Booking $booking): void
    {
        $property = $booking->properties;

        if (!$property || !count($property->getAttributes())) {
            return;
        }

        if (!$property?->booking_id) {
            $property->booking_id = $booking->id;
        }

        $property->save();
    }
}
