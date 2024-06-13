<?php

declare(strict_types=1);

namespace Karaev\Vehicle\Infrastructure\Eloquent\Repository;

use Karaev\Vehicle\Domain\Api\Data\VehicleDataInterface;
use Karaev\Vehicle\Domain\Models\Vehicle;
use Karaev\Vehicle\Domain\Api\Data\VehicleUrlRewriteDataInterface;
use Karaev\Vehicle\Domain\Api\VehicleUrlRewriteRepositoryInterface;
use Karaev\Vehicle\Infrastructure\Eloquent\Model\VehicleUrlRewrite;
use Karaev\Vehicle\Infrastructure\Eloquent\Transformer\VehicleUrlRewriteTransformer;

class VehicleUrlRewriteRepository implements VehicleUrlRewriteRepositoryInterface
{
    public function __construct(protected VehicleUrlRewriteTransformer $vehicleTransformer) {}

    public function getById(int $id): VehicleUrlRewriteDataInterface
    {
        // TODO: Implement getById() method.
    }

    public function getByUrl(string $url): VehicleUrlRewriteDataInterface
    {
        $urlRewrite = VehicleUrlRewrite::where(VehicleUrlRewriteDataInterface::URL_REWRITE, $url)->firstOrNew();

        return $this->vehicleTransformer->entityToDomain($urlRewrite);
    }

    public function getOrGenerateUrl(Vehicle $vehicle)
    {
    }

    /**
     * TODO::
     */
    public function generateUniqueUrl(array $data): string
    {
        return \Karaev\Vehicle\Application\Helper\VehicleUrlRewriteGenerateHelper::arrayToSlug($data);
    }
}
