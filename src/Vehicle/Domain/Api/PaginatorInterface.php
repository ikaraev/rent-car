<?php

namespace Karaev\Vehicle\Domain\Api;

use Karaev\Vehicle\Domain\Models\Paginator\PaginatorCollectionInterface;

interface PaginatorInterface
{
    public function paginate($searchCriteria);
}
