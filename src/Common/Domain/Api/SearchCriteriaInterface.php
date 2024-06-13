<?php

namespace Karaev\Common\Domain\Api;

interface SearchCriteriaInterface
{
    public function addFilter(FilterInterface $filter): self;
    public function addSortOrder(SortOrderBuilder $sortOrder): self;

    public function getLocale(): string;

    public function setLocale(string $locale): self;

    public function getFilters(): array;

    public function getRelationFilters();

    public function addRelationFilter(FilterInterface $filter): self;

    public function select($columns = '*');

    public function orderBy(string $column, $direction);
}
