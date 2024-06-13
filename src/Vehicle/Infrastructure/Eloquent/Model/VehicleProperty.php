<?php

namespace Karaev\Vehicle\Infrastructure\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Karaev\Vehicle\Infrastructure\Eloquent\Factories\VehiclePropertyFactory;

class VehicleProperty extends Model
{
    use HasFactory;

    public function getAttributeList(): array
    {
        return [
            'vehicle_id',
            'is_active',
            'name',
            'year',
            'engine',
            'rent_price',
            'gear_box',
            'fuel_consumption',
            'car_number',
            'vin_code',
            'first_period_discount_price',
            'second_period_discount_price',
        ];
    }

    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }

    protected static function newFactory()
    {
        return VehiclePropertyFactory::new();
    }
}
