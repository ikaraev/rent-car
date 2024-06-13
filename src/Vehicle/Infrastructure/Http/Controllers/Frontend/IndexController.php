<?php

namespace Karaev\Vehicle\Infrastructure\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Inertia\Response;
use Karaev\Common\Domain\Api\FilterConvertorServiceInterface;
use Karaev\Vehicle\Domain\Api\VehicleRepositoryInterface;
use Karaev\Vehicle\Infrastructure\Inertia\ViewModel\Frontend\VehicleListViewModel;
use Karaev\Vehicle\Application\Handler\Vehicle\FilterVehicleHandler;
use Karaev\Vehicle\Infrastructure\Services\AddSorOrderFilter;
use Karaev\Vehicle\Infrastructure\Services\DecodeStringFilter;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Karaev\Vehicle\Infrastructure\Services\AddAdditionalVehicleFilterService;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param DecodeStringFilter $decodeStringFilter
     * @param FilterConvertorServiceInterface $filterGenerationService
     * @param VehicleRepositoryInterface $vehicleRepository
     * @param VehicleListViewModel $vehicleIndexViewModel
     * @return Response
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function index(
        DecodeStringFilter   $decodeStringFilter,
        FilterConvertorServiceInterface $filterGenerationService,
        VehicleRepositoryInterface $vehicleRepository,
        VehicleListViewModel $vehicleIndexViewModel
    ): Response {
        $filters = AddAdditionalVehicleFilterService::apply($decodeStringFilter->convertString((string)request()->get('filter')));
        $filters = AddSorOrderFilter::apply($filters);

        $searchCriteria = $filterGenerationService->convert($filters);
        $searchCriteria->setLocale(app()->getLocale());
        $vehicleList = $vehicleRepository->getList($searchCriteria);

        return $vehicleIndexViewModel->setVehicles($vehicleList)->setFilters($filters)->render();
    }
}
