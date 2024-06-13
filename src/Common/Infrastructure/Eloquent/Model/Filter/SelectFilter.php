<?php

namespace Karaev\Common\Infrastructure\Eloquent\Model\Filter;

class SelectFilter extends AbstractFilter
{
    public const FIELD = 'select';

    public function initFilter(array $data): self
    {
        $this->setName($data['name'] ?? '');
        $this->setValue($data['value'] ?? null);
        $this->setOptions($data['options'] ?? []);
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
}
