<?php

namespace Karaev\Vehicle\Application\Handler\Vehicle;

use Karaev\Vehicle\Domain\Api\PaginatorInterface;

final class VehiclePaginatorHandler
{
    public function __construct(protected PaginatorInterface $paginator) {}

    public function handler($searchCriteria)
    {
        return $this->paginator->paginate([]);
    }
}
