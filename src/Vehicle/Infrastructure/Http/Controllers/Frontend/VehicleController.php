<?php

namespace Karaev\Vehicle\Infrastructure\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Karaev\Booking\Infrastructure\Services\MassBookingDiscountPriceService;
use Karaev\Vehicle\Application\Handler\Vehicle\FilterVehicleHandler;
use Karaev\Vehicle\Application\Handler\Vehicle\GetActiveVehicleByUrlRewrite;
use Karaev\Vehicle\Infrastructure\Inertia\ViewModel\Frontend\VehicleIndexViewModel;
use Karaev\Vehicle\Infrastructure\Services\AddAdditionalVehicleFilterService;
use Karaev\Vehicle\Infrastructure\Services\DecodeStringFilter;
use Karaev\Booking\Infrastructure\Services\BookingDiscountPriceService;
use Karaev\Booking\Application\Handler\Price\BookingPriceCalculator;

class VehicleController extends Controller
{
    public function index(
        string $urlRewrite,
        Request $request, /** Add separate request class */
        GetActiveVehicleByUrlRewrite $getVehicleByUrlRewrite,
        VehicleIndexViewModel $vehicleIndexViewModel,
        FilterVehicleHandler $filterVehicleHandler,
        DecodeStringFilter   $decodeStringFilter,
        BookingDiscountPriceService $bookingDiscountPriceService,
        MassBookingDiscountPriceService $massBookingDiscountPriceService
    ) {
        $filters = AddAdditionalVehicleFilterService::apply($decodeStringFilter->convertString((string)request()->get('filter')));

        try {
            $vehicleList = $massBookingDiscountPriceService
                ->setVehicleList($filterVehicleHandler->handler($filters))
                ->setFilters($filters)
                ->execute();

            $openedVehicle = $bookingDiscountPriceService
                ->setFilters($filters)
                ->setVehicle($getVehicleByUrlRewrite->handler($urlRewrite))
                ->addBookingPrices();

            $vehicleIndexViewModel
                ->setVehicles($vehicleList)
                ->setFilters($filters)
                ->setOpenedVehicle($openedVehicle);
        } catch (\Exception $exception) {
            return redirect()->route('frontend.index');
        }

        return $vehicleIndexViewModel->render();
    }
}
