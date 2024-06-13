<?php

namespace Karaev\Common\Infrastructure\Inertia\ViewModel\Admin\Grid;

use Illuminate\Contracts\Support\Arrayable;

interface ColumnInterface extends Arrayable
{
    public function getField(): string;

    public function setField(string $field): self;

    public function getLabel(): string;

    public function setLabel(string $label): self;

    public function getOptions(): array;

    public function setOptions(array $options): self;

    public function getSortable(): bool;

    public function setSortable(bool $sortable): self;
}
