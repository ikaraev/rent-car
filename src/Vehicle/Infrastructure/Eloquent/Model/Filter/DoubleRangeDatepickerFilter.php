<?php

namespace Karaev\Vehicle\Infrastructure\Eloquent\Model\Filter;

use Karaev\Common\Domain\Api\FilterInterface;

class DoubleRangeDatepickerFilter extends \Karaev\Common\Infrastructure\Eloquent\Model\Filter\RangeDatepickerFilter
{
    public const FIELD = 'booking-double-range-datepicker';

    private const COMMA_SEPARATOR = ',';

    public function initFilter(array $data): FilterInterface
    {
        $this->setName($data['name']);
        $this->setValue($data['value'] ?? []);
        $this->setReference($data['reference'] ?? '');

        if (isset($data['condition'])) {
            $this->setConditionType($data['condition']);
        }

        return $this;
    }

    public function apply($query)
    {
        $query->whereNotIn('vehicle_properties.id', function ($query) {
            $query->select('bookings.vehicle_id')
                ->from('bookings')
                ->where('start', '<=', (new \DateTime($this->getValue()[self::END_DATE]))->format('Y-m-d'))
                ->where('finish', '>=', (new \DateTime($this->getValue()[self::START_DATE]))->format('Y-m-d'));
        });

    }

    public function getField(): string
    {
        return self::FIELD;
    }
}
