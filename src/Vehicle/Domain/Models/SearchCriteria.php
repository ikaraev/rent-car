<?php

namespace Karaev\Vehicle\Domain\Models;

use Karaev\Vehicle\Domain\Api\FilterInterface;
use Karaev\Vehicle\Domain\Api\SearchCriteriaInterface;

class SearchCriteria implements SearchCriteriaInterface
{
    private array $filters = [];

    public function create(): SearchCriteriaInterface
    {
        // TODO: Implement create() method.
    }

    public function addFilter(FilterInterface $filter): SearchCriteriaInterface
    {
        $this->filters[] = $filter;
        return $this;
    }
}
