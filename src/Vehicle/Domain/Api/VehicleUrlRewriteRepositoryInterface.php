<?php

namespace Karaev\Vehicle\Domain\Api;

use Karaev\Vehicle\Domain\Api\Data\VehicleUrlRewriteDataInterface;
use Karaev\Vehicle\Domain\Models\Vehicle;

interface VehicleUrlRewriteRepositoryInterface
{
    public function getById(int $id): VehicleUrlRewriteDataInterface;

    public function getByUrl(string $url): VehicleUrlRewriteDataInterface;

    public function getOrGenerateUrl(Vehicle $vehicle);

    public function generateUniqueUrl(array $data): string;
}
