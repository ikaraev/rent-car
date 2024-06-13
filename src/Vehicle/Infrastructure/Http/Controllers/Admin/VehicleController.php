<?php

namespace Karaev\Vehicle\Infrastructure\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Karaev\Common\Infrastructure\Eloquent\Model\Filter\InputFilter;
use Karaev\Common\Infrastructure\Eloquent\Model\Filter\SortOrderFilter;
use Karaev\Vehicle\Application\Exception\VehicleNotFoundException;
use Karaev\Vehicle\Application\Handler\Vehicle\EditVehicleHandler;
use Karaev\Vehicle\Application\Handler\Vehicle\FilterVehicleHandler;
use Karaev\Vehicle\Application\Handler\Vehicle\RemoveVehicleHandler;
use Karaev\Vehicle\Application\Handler\Vehicle\SaveVehicleHandler;
use Karaev\Vehicle\Domain\Api\VehicleRepositoryInterface;
use Karaev\Common\Domain\Models\SearchCriteria;
use Karaev\Vehicle\Infrastructure\Eloquent\Transformer\VehicleTransformer;
use Karaev\Vehicle\Infrastructure\Http\Controllers\Requests\Admin\VehicleStoreRequest;
use Karaev\Vehicle\Infrastructure\Inertia\ViewModel\Admin\VehicleAdminEditPageViewModel;
use Karaev\Vehicle\Infrastructure\Inertia\ViewModel\Admin\VehicleAdminFormPageViewModel;
use Karaev\Vehicle\Infrastructure\Inertia\ViewModel\Admin\VehicleGridPageViewModel;
use Karaev\Vehicle\Infrastructure\Services\AddSorOrderFilter;
use Karaev\Vehicle\Infrastructure\Services\DecodeStringFilter;

class VehicleController extends Controller
{
    public function __construct(protected VehicleRepositoryInterface $vehicleRepository) {}

    public function index(
        DecodeStringFilter   $decodeStringFilter,
        FilterVehicleHandler $filterVehicleHandler,
        VehicleGridPageViewModel $vehicleGridPageViewModel
    ) {
        $filter = AddSorOrderFilter::apply($decodeStringFilter->convertString((string)request()->get('filter')));

        $vehicleList = $filterVehicleHandler->handler($filter);

        return $vehicleGridPageViewModel
            ->setCollection($vehicleList->toArray())
            ->setIncomeFilters($filter)
            ->render();
    }

    public function create(VehicleAdminFormPageViewModel $adminFormPageViewModel)
    {
        return $adminFormPageViewModel->render();
    }

    public function edit(
        $id,
        EditVehicleHandler $editVehicleHandler,
        VehicleAdminEditPageViewModel $adminEditPageViewModel
    ) {
        try {
            $vehicle = $editVehicleHandler->handler($id);

            return $adminEditPageViewModel
                ->setVehicle($vehicle)
                ->render();
        } catch (VehicleNotFoundException $exception) {
            return to_route('admin.car.index');
        }
    }

    public function changeLocale(
        $id,
        $locale,
        VehicleAdminEditPageViewModel $adminEditPageViewModel
    ) {
        $searchCriteria = new SearchCriteria();
        $filter = (new InputFilter())->setReference('properties')->setName('vehicle_id')->setValue($id);
        $searchCriteria->addFilter($filter)->setLocale($locale);

        $vehicle = $this->vehicleRepository->getFilteredItem($searchCriteria);

        return $adminEditPageViewModel->setVehicle($vehicle)->render();
    }

    public function store(
        VehicleStoreRequest $saveVehicleRequest,
        VehicleTransformer $vehicleTransformer,
        SaveVehicleHandler $saveVehicleHandler
    ) {
        $vehicleTransformer = $vehicleTransformer->arrayToDomain($saveVehicleRequest->all());

        $saveVehicleHandler->handler($vehicleTransformer);

        return to_route('admin.car.index');
    }

    public function destroy(
        $id,
        RemoveVehicleHandler $removeVehicleHandler
    ) {
        if ($removeVehicleHandler->handler((int)$id)) {
            return to_route('admin.car.index');
        }
    }
}
