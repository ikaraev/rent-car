<?php

declare(strict_types=1);

namespace Karaev\Vehicle\Infrastructure\Services;

use Karaev\Common\Infrastructure\Eloquent\Model\Filter\SortOrderFilter;

class AddSorOrderFilter
{
    public static function apply(array $filter)
    {
        if (!array_key_exists(SortOrderFilter::class, $filter)) {
            $sortOrderFilter[] = (new SortOrderFilter())
                ->setName('vehicle_id')
                ->setValue('desc')
                ->setReference('properties')
                ->toFilterArray();

            $filter = array_merge($filter, $sortOrderFilter);
        }

        return $filter;
    }
}
