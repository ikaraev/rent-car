<?php

namespace Karaev\Common\Infrastructure\Eloquent\Model\Filter;

class CheckboxFilter extends AbstractFilter
{
    public const FIELD = 'checkbox';

    public function getConditionType(): string
    {
        return 'in';
    }

    public function initFilter(array $data): self
    {
        $this->setName($data['name']);
        $this->setOptions($data['options'] ?? []);
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

    public function apply($query)
    {
        $this->applyFilter($query);
    }
}
