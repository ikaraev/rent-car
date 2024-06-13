<?php

namespace Karaev\Vehicle\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;

class VehicleServiceProvider extends ServiceProvider
{
    public $bindings = [
        \Karaev\Vehicle\Domain\Api\VehicleRepositoryInterface::class => \Karaev\Vehicle\Infrastructure\Eloquent\Repository\VehicleRepository::class,
        \Karaev\Vehicle\Domain\Api\PaginatorInterface::class => \Karaev\Vehicle\Infrastructure\Eloquent\Pagination\VehiclePaginator::class,
//        \Karaev\Vehicle\Domain\Api\SearchCriteriaInterface::class => \Karaev\Vehicle\Domain\Models\SearchCriteria::class,
        \Karaev\Vehicle\Domain\Api\VehicleUrlRewriteRepositoryInterface::class => \Karaev\Vehicle\Infrastructure\Eloquent\Repository\VehicleUrlRewriteRepository::class,
//        \Karaev\Vehicle\Domain\Api\VehicleMediaServiceInterface::class => \Karaev\Vehicle\Infrastructure\Services\VehicleMediaService::class
    ];
}
