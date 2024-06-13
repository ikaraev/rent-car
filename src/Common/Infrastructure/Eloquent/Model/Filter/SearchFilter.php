<?php

namespace Karaev\Common\Infrastructure\Eloquent\Model\Filter;

use Karaev\Common\Domain\Api\FilterInterface;

class SearchFilter extends AbstractFilter
{
    public const FIELD = 'search';

    public string $conditionType = 'like';

    public function apply($query)
    {
        $this->applyFilter($query);
    }

    public function getConditionType(): string
    {
        return $this->conditionType;
    }

    public function initFilter(array $data): FilterInterface
    {
        $this->setName($data['name']);
        $this->setValue($data['value']);
        $this->setReference($data['reference'] ?? '');

        return $this;
    }

    public function getField(): string
    {
        return self::FIELD;
    }
}
