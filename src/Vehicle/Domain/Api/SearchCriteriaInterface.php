<?php

namespace Karaev\Vehicle\Domain\Api;

interface SearchCriteriaInterface
{
    public function create(): self;

    public function addFilter(FilterInterface $filter): self;
}
