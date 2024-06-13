<?php

namespace Karaev\Vehicle\Infrastructure\Eloquent\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Karaev\Vehicle\Infrastructure\Eloquent\Model\Vehicle;

class VehicleFactory extends Factory
{
    protected $model = Vehicle::class;

    public function definition(): array
    {
        return [];
    }
}
