<?php

namespace Karaev\Vehicle\Domain\Api\Data;

interface VehicleImageDataInterface
{
    public const ID = 'id';
    public const VEHICLE_ID = 'vehicle_id';
    public const SORT_ORDER = 'sort_order';
    public const NAME = 'name';
    public const TYPE = 'type';

    public function getVehicleId(): int;

    public function setVehicleId(int $vehicleId): self;

    public function getSortOrder(): int;

    public function setSortOrder(int $sortOrder): self;

    public function getName(): string;

    public function setName(string $name): self;

    public function getType(): string;

    public function setType(string $type): self;
}
