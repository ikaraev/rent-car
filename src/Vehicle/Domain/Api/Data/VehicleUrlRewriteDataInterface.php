<?php

namespace Karaev\Vehicle\Domain\Api\Data;

interface VehicleUrlRewriteDataInterface
{
    public const ID = 'id';
    public const VEHICLE_ID = 'vehicle_id';
    public const URL_REWRITE = 'url_rewrite';

    public function getVehicleId(): int;

    public function setVehicleId(int $vehicleId): self;

    public function getUrlRewrite(): string;

    public function setUrlRewrite(string $urlRewrite): self;
}
