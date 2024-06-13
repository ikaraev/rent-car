<?php

declare(strict_types=1);

namespace Karaev\Vehicle\Infrastructure\Inertia\ViewModel\Admin;

use Karaev\Common\Infrastructure\Inertia\InertiaInterface;
use Karaev\Vehicle\Domain\Api\Data\VehicleUrlRewriteDataInterface;
use Karaev\Vehicle\Domain\Models\Resource\EngineResourceOptions;
use Karaev\Vehicle\Domain\Models\Resource\GearBoxResourceOptions;
use Karaev\Vehicle\Domain\Models\Resource\IsActiveResourceOptions;
use Karaev\Vehicle\Domain\Models\Resource\YearResourceOptions;
use Karaev\Common\Infrastructure\Inertia\ViewModel\Admin\FormInterface;
use Karaev\Common\Infrastructure\Inertia\ViewModel\Admin\Form\FormBuilder;
use Karaev\Common\Infrastructure\Inertia\ViewModel\Admin\Form\FormBlock;
use Karaev\Common\Infrastructure\Inertia\ViewModel\Admin\Form\Input\Text;
use Karaev\Common\Infrastructure\Inertia\ViewModel\Admin\Form\Input\Select;
use Karaev\Common\Infrastructure\Inertia\ViewModel\Admin\Form\Input\Textarea;
use Karaev\Admin\Infrastructure\Inertia\ViewModel\AdminLayoutViewModel;

abstract class AbstractAdminFormPageViewModel extends AdminLayoutViewModel implements InertiaInterface, FormInterface
{
    public function schema(): FormBuilder
    {
       return FormBuilder::make()->addBlock($this->buildPropertiesFormBlock());
    }

    private function buildPropertiesFormBlock(): FormBlock
    {
        return (new FormBlock())
            ->setCode('properties')
            ->setTitle('Vehicle properties')
            ->addInput(
                new Select('is_active', 'Is Active', (new IsActiveResourceOptions())->getOptions(), 'bool')
            )->addInput(
                new Text('name', 'Name')
            )->addInput(
                new Text('vin_code', 'Vin Code')
            )->addInput(
                new Text('car_number', 'Vehicle Number')
            )->addInput(
                new Text('rent_price', 'Rent price 1-3 day, per day, $'),
            )->addInput(
                new Text('first_period_discount_price', 'Rent price 4-8 days, per day, $'),
            )->addInput(
                new Text('second_period_discount_price', 'Rent price >8 days, per day, $'),
            )->addInput(
                new Select('gear_box', 'Gear Box', (new GearBoxResourceOptions())->getOptions())
            )->addInput(
                new Select('engine', 'Engine', (new EngineResourceOptions())->getOptions())
            )->addInput(
                new Select('year', 'Year', (new YearResourceOptions())->getOptions())
            )->addInput(
                new Text(VehicleUrlRewriteDataInterface::URL_REWRITE, 'Url Rewrite')
            )->addInput(
                new Textarea('description', 'Description')
            )->addInput(
                new Text('fuel_consumption', 'Fuel Consumption')
            );
    }
}
