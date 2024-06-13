<?php

declare(strict_types=1);

namespace Karaev\Vehicle\Domain\Models;

use Karaev\Common\Domain\Models\AbstractModel;
use Karaev\Vehicle\Domain\Api\Data\VehicleUrlRewriteDataInterface;

final class VehicleUrlRewrite extends AbstractModel implements VehicleUrlRewriteDataInterface
{

    public function getVehicleId(): int
    {
        return (int)$this->getData(self::VEHICLE_ID);
    }

    public function setVehicleId(int $vehicleId): VehicleUrlRewriteDataInterface
    {
        $this->setData(self::VEHICLE_ID, $vehicleId);
        return $this;
    }

    public function getUrlRewrite(): string
    {
        return (string)$this->getData(self::URL_REWRITE);
    }

    public function setUrlRewrite(string $urlRewrite): VehicleUrlRewriteDataInterface
    {
        $this->setData(self::URL_REWRITE, $urlRewrite);
        return $this;
    }
}
