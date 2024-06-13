<?php

namespace Karaev\Common\Infrastructure\Eloquent\Model\Filter;

use Karaev\Common\Domain\Api\FilterInterface;

class RangeDatepickerFilter extends AbstractFilter
{
    public const FIELD = 'range-datepicker';

    public const START_DATE = 'startDate';
    public const END_DATE = 'endDate';

    public function getConditionType(): string
    {
        return 'between';
    }

    public function apply($query)
    {
        $this->applyFilter($query);
    }

    public function initFilter(array $data): FilterInterface
    {
        $this->setName($data['name']);
        $this->setValue($data['value'] ?? []);
        $this->setReference($data['reference'] ?? '');

        if (isset($data['condition'])) {
            $this->setConditionType($data['condition']);
        }

        return $this;
    }

    public function getField(): string
    {
        return self::FIELD;
    }
}
