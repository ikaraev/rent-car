<?php

namespace Karaev\Vehicle\Infrastructure\Eloquent\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Karaev\Vehicle\Infrastructure\Eloquent\Factories\VehicleLocalizationFactory;

class VehicleLocalization extends Model
{
    use HasFactory;

    public function getAttributeList(): array
    {
        return [
            'description'
        ];
    }

    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }

    protected static function newFactory()
    {
        return VehicleLocalizationFactory::new();
    }
}
