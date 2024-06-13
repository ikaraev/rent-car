<?php

namespace Karaev\Common\Domain\Models;

use Karaev\Common\Domain\Api\FilterInterface;
use Karaev\Common\Domain\Api\SearchCriteriaInterface;
use Karaev\Common\Domain\Api\SortOrderBuilder;

class SearchCriteria implements SearchCriteriaInterface
{
    private array $filters = [];
    private array $relation = [];
    private array $relationFilters = [];
    private string $locale = 'en';
    private ?array $order = null;
    private $select;

    private SortOrderBuilder $sortOrder;

    public function addFilter(FilterInterface $filter): SearchCriteriaInterface
    {
        $this->filters[] = $filter;
        return $this;
    }

    public function addSortOrder(SortOrderBuilder $sortOrder): SearchCriteriaInterface
    {
        $this->sortOrder = $sortOrder;
        return $this;
    }

    public function getFilters(): array
    {
        return $this->filters;
    }

    public function getLocale(): string
    {
        return $this->locale;
    }

    public function setLocale(string $locale): self
    {
        $this->locale = $locale;
        return $this;
    }

    public function getRelationFilters(): array
    {
        return $this->relationFilters;
    }

    public function addRelation(string $relation): self
    {
        $this->relation[] = $relation;

        return $this;
    }

    public function addRelationFilter(FilterInterface $filter): self
    {
        $this->relationFilters[$filter->getReference()][] = $filter;

        return $this;
    }

    public function getSelect()
    {
        return $this->select;
    }

    public function select($columns = '*'): self
    {
        $this->select = $columns;
        return $this;
    }

    public function getOrder(): ?array
    {
        return $this->order;
    }

    public function orderBy(string $column, $direction)
    {
        $this->order['column'] = $column;
        $this->order['direction'] = $direction;

        return $this;
    }
}
