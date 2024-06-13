<?php

namespace Karaev\Common\Infrastructure\Eloquent\Model\Filter;

class InputFilter extends AbstractFilter
{
    public const FIELD = 'input';

    public function initFilter(array $data): self
    {
        $this->setName($data['name']);
        $this->setValue($data['value']);
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
