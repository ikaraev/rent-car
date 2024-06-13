<?php

namespace Karaev\Vehicle\Infrastructure\Eloquent\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Karaev\Vehicle\Infrastructure\Eloquent\Model\VehicleLocalization;

class VehicleLocalizationFactory extends Factory
{
    protected $model = VehicleLocalization::class;

    public function definition(): array
    {
        return [
            'description' => $this->faker->text
        ];
    }
}
