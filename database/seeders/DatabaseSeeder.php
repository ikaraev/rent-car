<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Karaev\Common\Domain\Api\Data\LocalizationInterface;
use Karaev\Vehicle\Infrastructure\Eloquent\Model\Vehicle;
use Karaev\Vehicle\Infrastructure\Eloquent\Model\VehicleImage;
use Karaev\Vehicle\Infrastructure\Eloquent\Model\VehicleLocalization;
use Karaev\Vehicle\Infrastructure\Eloquent\Model\VehicleProperty;
use Karaev\Vehicle\Infrastructure\Eloquent\Model\VehicleUrlRewrite;

class DatabaseSeeder extends Seeder
{
    public const FAKE_LOCALIZATIONS = [
        'en' => 'en_US',
        'ru' => 'ru_RU',
        'ge' => 'ka_GE',
        'tr' => 'tr-TR'
    ];

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Vehicle::unsetEventDispatcher();

        foreach (array_fill(0, 100, [1,2,3]) as $langIds) {
            $vehicle = Vehicle::factory()->create();
            $vehicleProperty = VehicleProperty::factory()->create([
                'vehicle_id' => $vehicle->id,
                'name' => fake()->randomElement(['Toyota Prius', 'Toyota Camry', 'Toyota Rav 4', 'BMW X5', 'BMW X6']),
                'engine' => fake()->randomElement(['Gasoline', 'Diesel', 'Hybrid']),
                'gear_box' => fake()->randomElement(['Any', 'Automatic', 'Manual']),
                'first_period_discount_price' => fake()->randomElement([15, 20]),
                'second_period_discount_price' => fake()->randomElement([15, 20, 22, 26, 30]),
                'rent_price' => fake()->randomElement([20, 22, 25, 30, 35, 40, 45, 50]),
                'fuel_consumption' => fake()->randomElement([5, 7, 8, 10, 12, 22]),
                'vin_code' => fake()->regexify('[A-Za-z0-9]{20}'),
                'year' => fake()->randomElement([1999, 2000, 2001, 2002, 2003, 2004, 2016, 2017, 2018, 2019, 2020, 2021, 2022, 2023]),
            ]);

            VehicleUrlRewrite::factory()->create([
                'vehicle_id' => $vehicle->id,
                'url_rewrite' => \Karaev\Vehicle\Application\Helper\VehicleUrlRewriteGenerateHelper::arrayToSlug([
                    $vehicleProperty->name,
                    $vehicleProperty->year,
                    $vehicleProperty->engine,
                    $vehicleProperty->gear_box,
                    $vehicleProperty->vin_code,
                ])
            ]);

            foreach ([1,2,3,4] as $order) {
                VehicleImage::factory(5)->create([
                    'vehicle_id' => $vehicle->id,
                    'name' => fake()->imageUrl,
                    'sort_order' => $order,
                    'type' => 'image/png'
                ]);
            }

            foreach (LocalizationInterface::CODE_ENUM as $langCode) {
                VehicleLocalization::factory()->create([
                    'vehicle_id' => $vehicle->id,
                    'localization_code' => $langCode,
                    'description' => fake(self::FAKE_LOCALIZATIONS[$langCode])->realText()
                ]);
            }
        }
    }
}
