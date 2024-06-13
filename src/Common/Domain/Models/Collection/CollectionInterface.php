<?php

namespace Karaev\Common\Domain\Models\Collection;

use Karaev\Common\Domain\Models\SimpleDataObject;

interface CollectionInterface
{
    public function getItems(): array;

    public function addItem(SimpleDataObject $object, $key = null): void;

    public function deleteItem($key): void;

    public function getItem($key): object;

    public function count(): int;

    public function getFirstItem();

    public function toArray(): array;
}
