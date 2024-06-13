<?php

namespace Karaev\Common\Domain\Api;

use Karaev\Common\Domain\Api\SearchCriteriaInterface;

interface FilterConvertorServiceInterface
{
    /**
     * @param FilterInterface[] $filters
     * @return SearchCriteriaInterface
     */
    public function convert(array $filters): SearchCriteriaInterface;
}
