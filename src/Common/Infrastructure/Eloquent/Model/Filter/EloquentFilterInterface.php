<?php

namespace Karaev\Common\Infrastructure\Eloquent\Model\Filter;

interface EloquentFilterInterface
{
    public function apply($query);
}
