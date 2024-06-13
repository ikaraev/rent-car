<?php

declare(strict_types=1);

namespace Karaev\Vehicle\Infrastructure\Services;

use DateTime;
use Karaev\Common\Infrastructure\Eloquent\Model\Filter\RangeDatepickerFilter;
use Karaev\Vehicle\Domain\Api\Data\VehicleDataInterface;
use Karaev\Common\Infrastructure\Eloquent\Model\Filter\InputFilter;
use Karaev\Vehicle\Infrastructure\Eloquent\Model\Filter\DoubleRangeDatepickerFilter;

class AddAdditionalVehicleFilterService
{
    public static function apply(array $filters = []): array
    {
        foreach ($filters as $key => $filter) {
            if (!isset($filter[DoubleRangeDatepickerFilter::class])) {
                $filters[] = self::getDefaultDatepickerFilter();;
            }
        }

        if (empty($filters)) {
            $filters[] = self::getDefaultDatepickerFilter();
        }

        $filters[][InputFilter::class] = ['name' => VehicleDataInterface::IS_ACTIVE, 'value' => 1, 'reference' => 'properties'];

        return $filters;
    }

    public static function getDefaultDatepickerFilter()
    {
        return [
            DoubleRangeDatepickerFilter::class => [
                'name' => DoubleRangeDatepickerFilter::FIELD,
                'value' => [
                    RangeDatepickerFilter::START_DATE => (new DateTime())->modify('+1 day')->format('d F'),
                    RangeDatepickerFilter::END_DATE => (new DateTime())->modify('+7 days')->format('d F')
                ],
                'reference' => 'booking'
            ]
        ];
    }
}
