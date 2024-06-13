<?php

declare(strict_types=1);

namespace Karaev\Booking\Infrastructure\Inertia\ViewModel\Admin;

use Karaev\Common\Infrastructure\Inertia\InertiaInterface;
use Karaev\Booking\Domain\Models\Resource\StatusResourceOptions;
use Karaev\Common\Infrastructure\Inertia\ViewModel\Admin\FormInterface;
use Karaev\Common\Infrastructure\Inertia\ViewModel\Admin\Form\FormBuilder;
use Karaev\Common\Infrastructure\Inertia\ViewModel\Admin\Form\FormBlock;
use Karaev\Common\Infrastructure\Inertia\ViewModel\Admin\Form\Input\Text;
use Karaev\Common\Infrastructure\Inertia\ViewModel\Admin\Form\Input\Select;
use Karaev\Common\Infrastructure\Inertia\ViewModel\Admin\Form\Input\Datepicker;
use Karaev\Common\Infrastructure\Inertia\ViewModel\Admin\Form\Input\Textarea;
use Karaev\Admin\Infrastructure\Inertia\ViewModel\AdminLayoutViewModel;

abstract class AbstractAdminFormPageViewModel extends AdminLayoutViewModel implements InertiaInterface, FormInterface
{
    public function schema(): FormBuilder
    {
        return FormBuilder::make()
            ->addBlock($this->buildPropertiesFormBlock())
            ->addBlock($this->buildContactFormBlock());
    }

    private function buildPropertiesFormBlock(): FormBlock
    {
        return (new FormBlock())
            ->setCode('properties')
            ->setTitle('Properties')
            ->addInput(
                new Select('status', 'Status', (new StatusResourceOptions())->getOptions())
            )->addInput(
                new Text('vehicle_id', 'Vehicle')
            )->addInput(
                new Datepicker('start', 'Start Book Date')
            )->addInput(
                new Datepicker('finish', 'Finish Book Date')
            )->addInput(
                new Text('day_price', 'Price per day')
            )->addInput(
                new Text('total_price', 'Total Price')
            );
    }

    private function buildContactFormBlock(): FormBlock
    {
        return (new FormBlock())
            ->setCode('contact_form')
            ->setTitle('Contact Form')
            ->addInput(
                new Text('name', 'Name')
            )->addInput(
                new Text('email', 'Email')
            )->addInput(
                new Text('phone', 'Phone')
            )->addInput(
                new Datepicker('date_birthday', 'Date Birthday')
            )->addInput(
                new Textarea('comment', 'Comment')
            );
    }
}
