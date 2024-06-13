<?php

declare(strict_types=1);

namespace Karaev\Vehicle\Infrastructure\Observers;

use Karaev\Vehicle\Infrastructure\Eloquent\Model\Vehicle;
use Karaev\Vehicle\Infrastructure\Eloquent\Model\VehicleProperty;

class VehiclePropertyObserver
{
    public function saving(Vehicle $vehicle): void
    {
        $property = $vehicle->properties ?? new VehicleProperty();

        foreach ($property->getAttributeList() as $attribute) {
            if (array_key_exists($attribute, $vehicle->getAttributes())) {
                $property->{$attribute} = $vehicle->getAttribute($attribute);
                $vehicle->offsetUnset($attribute);
            }
        }
        $vehicle->setRelation('properties', $property);
    }

    public function saved(Vehicle $vehicle): void
    {
        $property = $vehicle->properties;

        if (!$property || !count($property->getAttributes())) {
            return;
        }

        if (!$property?->vehicle_id) {
            $property->vehicle_id = $vehicle->id;
        }

        $property->save();
    }
}
