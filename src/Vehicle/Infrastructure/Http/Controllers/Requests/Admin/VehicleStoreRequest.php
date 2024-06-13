<?php

declare(strict_types=1);

namespace Karaev\Vehicle\Infrastructure\Http\Controllers\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class VehicleStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:250',
            'rent_price' => 'required|integer',
            'first_period_discount_price' => 'required|integer',
            'second_period_discount_price' => 'required|integer',
            'car_number' => 'required|string',
            'vin_code' => 'required|string',
        ];
    }
}
