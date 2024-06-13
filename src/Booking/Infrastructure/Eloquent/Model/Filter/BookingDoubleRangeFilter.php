<?php

namespace Karaev\Booking\Infrastructure\Eloquent\Model\Filter;

use Karaev\Common\Domain\Api\FilterInterface;

class BookingDoubleRangeFilter extends \Karaev\Common\Infrastructure\Eloquent\Model\Filter\RangeDatepickerFilter
{
    private const COMMA_SEPARATOR = ',';

    public function initFilter(array $data): FilterInterface
    {
        $this->setName(implode(self::COMMA_SEPARATOR, $data['name']));
        $this->setValue($data['value'] ?? []);
        $this->setReference($data['reference'] ?? '');

        if (isset($data['condition'])) {
            $this->setConditionType($data['condition']);
        }

        return $this;
    }

    public function apply($query)
    {
        $query
            ->where('start', '>=', (new \DateTime($this->getValue()['start']))->format('Y-m-d'))
            ->where('finish', '>=', (new \DateTime($this->getValue()['finish']))->format('Y-m-d'));
    }
}
