<?php

namespace Karaev\Booking\Infrastructure\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Karaev\Booking\Infrastructure\Eloquent\Transformer\BookingTransformer;
use Karaev\Booking\Infrastructure\Http\Requests\Api\V1\BookingStoreRequest;
use Karaev\Booking\Infrastructure\Services\Api\CreateBookingApiService;

class CreateBookingController extends Controller
{
    /**
     * @param BookingStoreRequest $bookingStoreRequest
     * @param BookingTransformer $bookingTransformer
     * @param CreateBookingApiService $createBookingApiService
     * @return JsonResponse
     */
    public function execute(
        BookingStoreRequest $bookingStoreRequest,
        BookingTransformer $bookingTransformer,
        CreateBookingApiService $createBookingApiService
    ): JsonResponse {
        try {
            $domain = $bookingTransformer->arrayToDomain($bookingStoreRequest->getPreparedParams());

            $createBookingApiService->setBookingDomain($domain)->execute();

            $result = response()->json(['success' => true]);
        } catch (\Exception $exception) {
            $result = response()->json(['success' => false]);
        }

        return $result;
    }
}
