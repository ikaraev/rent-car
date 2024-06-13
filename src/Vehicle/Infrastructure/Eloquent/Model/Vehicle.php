<?php

namespace Karaev\Vehicle\Infrastructure\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Traits\Localizable;
use Karaev\Vehicle\Infrastructure\Eloquent\Factories\VehicleFactory;
use Karaev\Booking\Infrastructure\Eloquent\Model\Booking;
use Karaev\Common\Domain\Api\LocalizableInterface;
use Karaev\Common\Domain\Api\Data\LocalizationInterface;

class Vehicle extends AbstractVehicleModel implements LocalizableInterface
{
    use HasFactory, Localizable;

    protected $dispatchesEvents = [
        'saving',
        'saved'
    ];

    private string $locale = LocalizationInterface::EN_CODE;

    public function localizations(): HasMany
    {
        return $this->hasMany(VehicleLocalization::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(VehicleImage::class);
    }

    public function properties(): HasOne
    {
        return $this->hasOne(VehicleProperty::class)->orderby('vehicle_id');
    }

    public function urlRewrite(): HasOne
    {
        return $this->hasOne(VehicleUrlRewrite::class);
    }

    public function booking(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    protected static function newFactory()
    {
        return VehicleFactory::new();
    }

    public function setLocale(string $locale): self
    {
        $this->locale = $locale;

        return $this;
    }

    public function getLocale(): string
    {
        return $this->locale ?: app()->getLocale();
    }
}
