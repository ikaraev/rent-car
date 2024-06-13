<?php

namespace Karaev\Vehicle\Domain\Models\Paginator;

use Karaev\Common\Domain\Models\Collection\AbstractCollection;

class PaginatorCollection extends AbstractCollection implements PaginatorCollectionInterface
{
    private array $data = [];

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
