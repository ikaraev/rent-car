<?php

declare(strict_types=1);

namespace Karaev\Vehicle\Domain\Models;

use Karaev\Common\Domain\Models\AbstractModel;
use Karaev\Vehicle\Domain\Api\Data\VehicleImageDataInterface;

final class VehicleImage extends AbstractModel implements VehicleImageDataInterface
{
    public function getName(): string
    {
        return (string)$this->getData(self::NAME);
    }

    public function setName(string $name): self
    {
        $this->setData(self::NAME, $name);
        return $this;
    }

    public function getVehicleId(): int
    {
        return $this->getData(self::VEHICLE_ID);
    }

    public function setVehicleId(int $vehicleId): VehicleImageDataInterface
    {
        $this->setData(self::VEHICLE_ID, $vehicleId);
        return $this;
    }

    public function getSortOrder(): int
    {
        return $this->getData(self::SORT_ORDER);
    }

    public function setSortOrder(int $sortOrder): VehicleImageDataInterface
    {
        $this->setData(self::SORT_ORDER, $sortOrder);
        return $this;
    }

    public function getType(): string
    {
        return $this->getData(self::TYPE);
    }

    public function setType(string $type): VehicleImageDataInterface
    {
        $this->setData(self::TYPE, $type);

        return $this;
    }
}
