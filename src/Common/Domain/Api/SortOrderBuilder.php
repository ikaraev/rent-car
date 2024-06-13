<?php

namespace Karaev\Common\Domain\Api;

use Karaev\Common\Domain\Enum\SortOrderEnum;

interface SortOrderBuilder
{
    public function getField(): string;
    public function setField(string $field): self;
    public function getDirection(SortOrderEnum $sortOrder): string;
    public function setDirection(string $direction): self;
}
