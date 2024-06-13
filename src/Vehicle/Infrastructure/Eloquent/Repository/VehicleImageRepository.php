<?php

namespace Karaev\Vehicle\Infrastructure\Eloquent\Repository;

use Karaev\Vehicle\Infrastructure\Eloquent\Model\VehicleImage;

class VehicleImageRepository
{
    public function getById($imageId)
    {
        return VehicleImage::findOrNew($imageId);
    }
}
