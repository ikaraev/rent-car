<?php

namespace Karaev\Vehicle\Infrastructure\Observers;

use Karaev\Vehicle\Infrastructure\Eloquent\Model\Vehicle;
use Karaev\Vehicle\Infrastructure\Eloquent\Model\VehicleUrlRewrite;
use Karaev\Vehicle\Domain\Api\VehicleUrlRewriteRepositoryInterface;

class VehicleUrlRewriteObserver
{
    public function __construct(private VehicleUrlRewriteRepositoryInterface $vehicleUrlRewriteRepository) {}

    public function saving(Vehicle $vehicle): void
    {
        $urlRewrite = $vehicle->urlRewrite ?? new VehicleUrlRewrite();

        if (array_key_exists('url_rewrite', $vehicle->getAttributes())) {
            $urlRewrite->url_rewrite = $this->extractUrlRewrite($urlRewrite, $vehicle);
            $vehicle->offsetUnset('url_rewrite');
        }

        $vehicle->setRelation('urlRewrite', $urlRewrite);
    }

    public function saved(Vehicle $vehicle): void
    {
        $urlRewrite = $vehicle->urlRewrite;

        if (!$urlRewrite || !count($urlRewrite->getAttributes())) {
            return;
        }

        if (!$urlRewrite?->vehicle_id) {
            $urlRewrite->vehicle_id = $vehicle->id;
        }

        $urlRewrite->save();
    }

    private function extractUrlRewrite($urlRewrite, $vehicle)
    {
        return $vehicle->id && $urlRewrite->url_rewrite ?
            $vehicle->getAttribute('url_rewrite') :
            $this->vehicleUrlRewriteRepository->generateUniqueUrl([
                $vehicle->name,
                $vehicle->year,
                $vehicle->engine,
                $vehicle->gear_box,
                $vehicle->vin_code,
            ]);
    }
}
