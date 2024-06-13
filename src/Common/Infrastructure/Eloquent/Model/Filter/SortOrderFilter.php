<?php

declare(strict_types=1);

namespace Karaev\Common\Infrastructure\Eloquent\Model\Filter;

use Karaev\Common\Domain\Api\FilterInterface;

class SortOrderFilter extends AbstractFilter
{
    public const FIELD = 'sortOrder';

    public function apply($query)
    {
        $column = $this->getReference() ? $this->getReference() . '.' . $this->getName() : $this->getName();
        $query->orderBy($column, $this->getValue());
    }

    public function initFilter(array $data): FilterInterface
    {
        $this->setName($data['name']);
        $this->setValue($data['value']  ?? 'desc');
        $this->setReference($data['reference'] ?? '');

        return $this;
    }

    public function getField(): string
    {
        return self::FIELD;
    }
}
