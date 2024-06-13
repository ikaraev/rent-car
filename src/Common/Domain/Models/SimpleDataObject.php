<?php

namespace Karaev\Common\Domain\Models;

class SimpleDataObject
{
    private array $data = [];

    public function getData($property = null)
    {
        if ($property === null) {
            return $this->data;
        }

        return $this->data[$property] ?? null;
    }

    public function setData($property, $value): self
    {
        $this->data[$property] = $value;

        return $this;
    }

    public function unset(string $key): void
    {
        unset($this->data[$key]);
    }

    public function __set($key, $value): void
    {
        $this->data[$key] = $value;
    }

    public function __get($key)
    {
        if (array_key_exists($key, $this->data)) {
            return $this->data[$key];
        }

        return null;
    }

    public function toArray(): array
    {
        $result = [];

        foreach ($this->data as $property => $data) {
            $result[$property] = $data;
        }

        return $result;
    }
}
