<?php

namespace Karaev\Booking\Infrastructure\Eloquent\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BookingContactForm extends Model
{
    protected $fillable = [
        'booking_id',
        'email',
        'name',
        'phone',
        'date_birthday',
        'comment'
    ];

    public function getAttributeList(): array
    {
        return [
            'booking_id',
            'email',
            'name',
            'phone',
            'date_birthday',
            'comment',
        ];
    }

    public function booking(): BelongsTo
    {
        return $this->belongsTo(Booking::class);
    }
}
