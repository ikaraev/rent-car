<?php

declare(strict_types=1);

namespace Karaev\Common\Infrastructure\Inertia\ViewModel\Admin\Filter;

use Karaev\Common\Infrastructure\Eloquent\Model\Filter\AbstractFilter;

class Filter implements FilterInterface
{
    private array $filters = [];
    private string $action;

    public function toArray()
    {
        return [
            'filters' => $this->filters,
            'action' => $this->action
        ];
    }

    public function setFilter(AbstractFilter $filters): FilterInterface
    {
        $this->filters[] = $filters->toArray();
        return $this;
    }

    public function setAction(string $action): FilterInterface
    {
        $this->action = $action;
        return $this;
    }
}
