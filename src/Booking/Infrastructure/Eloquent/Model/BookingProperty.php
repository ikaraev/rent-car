<?php

namespace Karaev\Booking\Infrastructure\Eloquent\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BookingProperty extends Model
{
    protected $fillable = [
        'booking_id',
        'user_id',
        'insurance_type',
        'is_free_cancellation',
        'is_second_driver',
        'baby_seat',
        'child_seat',
        'receiving_city',
        'receiving_address',
        'return_city',
        'return_address',
        'day_price',
        'total_price'
    ];

    public function getAttributeList(): array
    {
        return [
            'booking_id',
            'user_id',
            'insurance_type',
            'is_free_cancellation',
            'is_second_driver',
            'baby_seat',
            'child_seat',
            'receiving_city',
            'receiving_address',
            'return_city',
            'return_address',
            'day_price',
            'total_price',
        ];
    }

    public function booking(): BelongsTo
    {
        return $this->belongsTo(Booking::class);
    }
}
