<?php

namespace Karaev\Booking\Infrastructure\Observers;

use Karaev\Booking\Infrastructure\Eloquent\Model\Booking;
use Karaev\Booking\Infrastructure\Eloquent\Model\BookingContactForm;

class BookingContactFormObserver
{
    public function saving(Booking $booking)
    {
        $contactForm = $booking->contactForm ?? new BookingContactForm();
        foreach ($contactForm->getAttributeList() as $attribute) {
            if (array_key_exists($attribute, $booking->getAttributes())) {
                $contactForm->{$attribute} = $booking->getAttribute($attribute);
                $booking->offsetUnset($attribute);
            }
        }
        $booking->setRelation('contactForm', $contactForm);
    }

    public function saved(Booking $booking): void
    {
        $contactForm = $booking->contactForm;

        if (!$contactForm || !count($contactForm->getAttributes())) {
            return;
        }

        if (!$contactForm?->booking_id) {
            $contactForm->booking_id = $booking->id;
        }

        $contactForm->save();
    }
}
