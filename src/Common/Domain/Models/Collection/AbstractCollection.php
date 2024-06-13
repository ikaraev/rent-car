<?php

namespace Karaev\Common\Domain\Models\Collection;

use Karaev\Common\Domain\Models\SimpleDataObject;

abstract class AbstractCollection implements CollectionInterface
{
    private array $items = [];

    private array $data = [];

    public function getItems(): array
    {
        return $this->items;
    }

    public function addItem(SimpleDataObject $object, $key = null): void
    {
        $key === null ? $this->items[] = $object : $this->items[$key] = $object;
    }

    public function deleteItem($key): void
    {
        if (!isset($this->items[$key])) {

        }
        unset($this->items[$key]);
    }

    public function getItem($key): object
    {
        if (!isset($this->items[$key])) {

        }
        return $this->items[$key];
    }

    public function count(): int
    {
        return count($this->items);
    }

    public function getFirstItem()
    {
        if (!isset($this->items[0])) {
            return null;
        }
        return $this->items[0];
    }

    public function itemsToArray(): array
    {
        $result = [];

        foreach ($this->items as $item) {
            $result[] = $item->toArray();
        }

        return $result;
    }

    public function dataToArray(): array
    {
        $result = [];

        foreach ($this->data as $key => $data) {
            $result[$key] = $data;
        }

        return $result;
    }

    public function toArray(): array
    {
        $result = [];

        $result['items'] = $this->itemsToArray();
        $result['data'] = $this->dataToArray();

        return $result;
    }

    public function __set($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function __get($key)
    {
        if (!isset($this->data[$key])) {
        }

        return $this->data[$key];
    }
}
