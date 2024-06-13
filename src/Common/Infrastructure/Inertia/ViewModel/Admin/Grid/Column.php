<?php

declare(strict_types=1);

namespace Karaev\Common\Infrastructure\Inertia\ViewModel\Admin\Grid;

use Karaev\Common\Infrastructure\Eloquent\Model\Filter\SortOrderFilter;

final class Column implements ColumnInterface
{
    public function __construct(
        private string $field,
        private string $label,
        private array $options = [],
        private bool $sortable = false
    ) {}

    public function getField(): string
    {
        return $this->field;
    }

    public function setField(string $field): ColumnInterface
    {
        $this->field = $field;
        return $this;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function setLabel(string $label): ColumnInterface
    {
        $this->label = $label;
        return $this;
    }

    public function getOptions(): array
    {
        return $this->options;
    }

    public function setOptions(array $options): ColumnInterface
    {
        $this->options = $options;
        return $this;
    }

    public function getSortable(): bool
    {
        return $this->sortable;
    }

    public function setSortable(bool $sortable): ColumnInterface
    {
        $this->sortable = $sortable;
        return $this;
    }

    public function toArray(): array
    {
        $result = [
            'field' => $this->field,
            'label' => $this->label,
            'options' => count($this->options) ? $this->options : null,
            'sortable' => $this->sortable
        ];

        return $this->sortable ?
            array_merge($result, ['filter' => (new SortOrderFilter($this->field))->toArray()]) :
            $result;
    }
}
