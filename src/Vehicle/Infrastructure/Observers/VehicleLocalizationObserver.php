<?php

declare(strict_types=1);

namespace Karaev\Vehicle\Infrastructure\Observers;

use Karaev\Vehicle\Infrastructure\Eloquent\Model\Vehicle;
use Karaev\Vehicle\Infrastructure\Eloquent\Model\VehicleLocalization;

class VehicleLocalizationObserver
{
    public function saving(Vehicle $vehicle)
    {
        $localization = $this->extractLocalization($vehicle);

        foreach ($localization->getAttributeList() as $attribute) {
            if (array_key_exists($attribute, $vehicle->getAttributes())) {

                $localization->{$attribute} = $vehicle->getAttribute($attribute);
                $vehicle->offsetUnset($attribute);
            }
        }

        $vehicle->setRelation('localizations', collect([$localization]));

    }

    public function saved(Vehicle $vehicle)
    {
        if (!isset($vehicle->localizations[0])) {
            return;
        }

        $localization = $vehicle->localizations[0];

        if (!$localization?->vehicle_id) {
            $localization->vehicle_id = $vehicle->id;
        }

        $localization?->save();
    }

    private function extractLocalization(Vehicle $vehicle)
    {
        if (!empty($vehicle->localizations)) {
            foreach ($vehicle->localizations as $localization) {
                if ($localization->localization_code === $vehicle->getLocale()) {
                    return $localization;
                }
            }
        }

        $localization =  new VehicleLocalization();
        $localization->localization_code = $vehicle->getLocale();

        return $localization;
    }
}
