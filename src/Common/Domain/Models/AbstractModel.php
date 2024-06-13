<?php

namespace Karaev\Common\Domain\Models;

abstract class AbstractModel extends SimpleDataObject
{
    public function getId(): int
    {
        return (int)$this->getData('id');
    }

    public function setId(int $id)
    {
        $this->setData('id', $id);
        return $this;
    }
}
