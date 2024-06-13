<?php

namespace Karaev\Vehicle\Infrastructure\Eloquent\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Karaev\Vehicle\Infrastructure\Eloquent\Factories\VehicleUrlRewriteFactory;

class VehicleUrlRewrite extends Model
{
    use HasFactory;

    public function getAttributeList(): array
    {
        return ['url_rewrite'];
    }

    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }

    public static function factory($count = null, $state = [])
    {
        return VehicleUrlRewriteFactory::new();
    }
}
