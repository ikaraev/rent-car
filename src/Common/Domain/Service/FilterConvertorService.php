<?php

namespace Karaev\Common\Domain\Service;

use Karaev\Common\Domain\Api\SearchCriteriaInterface;
use Karaev\Common\Domain\Api\FilterConvertorServiceInterface;

final class FilterConvertorService implements FilterConvertorServiceInterface
{
    public function __construct(private SearchCriteriaInterface $searchCriteria) {}

    public function convert(array $filters): SearchCriteriaInterface
    {
        $searchCriteria = $this->searchCriteria;

        foreach ($filters as $key => $filter) {
            foreach ($filter as $filterClass => $filterParameters) {
                /** @var $filterInstance \Karaev\Common\Domain\Api\FilterInterface */
                $filterInstance = (new $filterClass())->initFilter($filterParameters);
                $searchCriteria->addFilter($filterInstance);
            }
        }

        return $searchCriteria;
    }
}
