<?php

namespace Karaev\Booking\Infrastructure\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Karaev\Vehicle\Infrastructure\Eloquent\Model\Vehicle;

class Booking extends AbstractBookingModel
{
    protected $fillable = [
        'vehicle_id',
        'start',
        'finish',
        'status'
    ];

    public function properties(): HasOne
    {
        return $this->hasOne(BookingProperty::class);
    }

    public function contactForm(): HasOne
    {
        return $this->hasOne(BookingContactForm::class);
    }

    public function vehicle(): HasOne
    {
        return $this->hasOne(Vehicle::class);
    }
}
