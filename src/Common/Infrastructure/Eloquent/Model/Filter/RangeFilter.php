<?php

namespace Karaev\Common\Infrastructure\Eloquent\Model\Filter;

class RangeFilter extends AbstractFilter
{
    public const FIELD = 'range';

    public function getConditionType(): string
    {
        return 'between';
    }

    public function initFilter(array $data): self
    {
        $this->setName($data['name']);
        $this->setValue($this->extractRangeValue($data['value'] ?? []));
        $this->setReference($data['reference'] ?? '');

        return $this;
    }

    public function getField(): string
    {
        return self::FIELD;
    }

    public function apply($query)
    {
        $this->applyFilter($query);
    }

    private function extractRangeValue($data)
    {
        $min = null;
        $max = null;

        if (isset($data['min']) && $data['min']) {
            $min = (int)$data['min'];
        }

        if (isset($data['max']) && $data['max']) {
            $max = (int)$data['max'];
        }


        if ($min || $max) {
            return [$min, $max];
        }

        return $data;
    }
}
