<?php

declare(strict_types=1);

namespace Karaev\Booking\Infrastructure\Http\Controllers\Admin;

use Exception;
use Karaev\Booking\Application\Handler\Booking\SaveBookingHandler;
use Karaev\Booking\Infrastructure\Eloquent\Transformer\BookingTransformer;
use Karaev\Booking\Infrastructure\Http\Requests\Admin\BookingStoreRequest;
use Karaev\Common\Infrastructure\Service\DecodeStringFilter;
use Karaev\Booking\Application\Handler\Booking\EditBookingHandler;
use Karaev\Booking\Application\Handler\Booking\FilterBookingHandler;
use Karaev\Booking\Infrastructure\Inertia\ViewModel\Admin\BookingGridPageViewModel;
use Karaev\Booking\Infrastructure\Inertia\ViewModel\Admin\BookingAdminEditPageViewModel;
use Karaev\Booking\Infrastructure\Inertia\ViewModel\Admin\BookingAdminFormPageViewModel;

class BookingController
{
    public function index(
        DecodeStringFilter $decodeStringFilter,
        FilterBookingHandler $filterBookingHandler,
        BookingGridPageViewModel $bookingGridPageViewModel
    ) {
        $filter = $decodeStringFilter->convertString((string)request()->get('filter'));

        $bookingList = $filterBookingHandler->handler($filter);
        return $bookingGridPageViewModel->setCollection($bookingList->toArray())->render();
    }

    public function create(BookingAdminFormPageViewModel $bookingAdminFormPageViewModel)
    {
        return $bookingAdminFormPageViewModel->render();
    }

    public function edit(
        int $id,
        EditBookingHandler $editBookingHandler,
        BookingAdminEditPageViewModel $bookingAdminEditPageViewModel
    ) {
        try {
            $booking = $editBookingHandler->handler($id);

            return $bookingAdminEditPageViewModel
                ->setBooking($booking)
                ->render();
        } catch (Exception $exception) {
            return to_route('admin.car.index');
        }
    }

    public function store(
        BookingStoreRequest $bookingStoreRequest,
        BookingTransformer $bookingTransformer,
        SaveBookingHandler $saveBookingHandler
    ) {
        $domain = $bookingTransformer->arrayToDomain($bookingStoreRequest->getPreparedParams());

        $saveBookingHandler->handler($domain);

        return to_route('admin.booking.index');
    }
}
