<?php

declare(strict_types=1);

namespace Karaev\Common\Infrastructure\Inertia\ViewModel\Admin;

use Inertia\Inertia;
use Karaev\Common\Infrastructure\Inertia\InertiaInterface;
use Karaev\Common\Infrastructure\Inertia\ViewModel\Admin\Grid\ColumnInterface;
use Karaev\Common\Infrastructure\Eloquent\Model\Filter\AbstractFilter;
use Karaev\Common\Infrastructure\Inertia\ViewModel\Admin\Filter\FilterInterface;
use Karaev\Admin\Infrastructure\Inertia\ViewModel\AdminLayoutViewModel;

abstract class AbstractGridViewModel extends AdminLayoutViewModel implements InertiaInterface
{
    /**
     * @var ColumnInterface[]
     */
    private array $columns = [];

    /**
     * @var array
     */
    private array $filter = [];

    /**
     * @var string
     */
    private string $component = '';

    /**
     * @var array
     */
    private $collection;

    /**
     * @var string|null
     */
    private ?string $createLink = null;

    /**
     * @var string|null
     */
    private ?string $editLink = null;

    /**
     * @param ColumnInterface $column
     * @return $this
     */
    public function setColumn(ColumnInterface $column): self
    {
        $this->columns[] = $column->toArray();
        return $this;
    }

    public function setFilter(FilterInterface $filter): self
    {
        $this->filter = $filter->toArray();
        return $this;
    }

    /**
     * @param string $component
     * @return $this
     */
    public function setComponent(string $component): self
    {
        $this->component = $component;
        return $this;
    }

    /**
     * @param array $collection
     * @return $this
     */
    public function setCollection($collection): self
    {
        $this->collection = $collection;
        return $this;
    }

    public function setCreateLink(string $createLink): self
    {
        $this->createLink = $createLink;
        return $this;
    }

    public function setEditLink(string $editLink): self
    {
        $this->editLink = $editLink;
        return $this;
    }

    public function render()
    {
        $this->build();

        return Inertia::render($this->component, [
            'columns' => $this->columns,
            'filter' => $this->filter,
            'collection' => $this->collection,
            'createLink' => $this->createLink,
            'editLink' => $this->editLink
        ]);
    }

    abstract public function build(): self;
}
