<?php

namespace Karaev\Vehicle\Infrastructure\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Karaev\Vehicle\Infrastructure\Http\Controllers\Requests\Admin\VehicleTmpImageRequest;

class VehicleImageController extends Controller
{
    /**
     * @param VehicleTmpImageRequest $vehicleImageRequest
     * @return array
     */
    public function execute(
        VehicleTmpImageRequest $vehicleImageRequest,
    ): array {

        $path = $vehicleImageRequest->file('image')->store('/images/resource', ['disk' => 'tmp']);

        return ["name" => $path];
    }
}
