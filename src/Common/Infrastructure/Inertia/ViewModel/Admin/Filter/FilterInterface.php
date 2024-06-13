<?php

namespace Karaev\Common\Infrastructure\Inertia\ViewModel\Admin\Filter;

use Illuminate\Contracts\Support\Arrayable;
use Karaev\Common\Infrastructure\Eloquent\Model\Filter\AbstractFilter;

interface FilterInterface extends Arrayable
{
    public function setFilter(AbstractFilter $filters): self;

    public function setAction(string $action): self;
}
