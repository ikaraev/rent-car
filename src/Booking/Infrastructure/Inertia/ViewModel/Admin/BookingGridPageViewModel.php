<?php

namespace Karaev\Booking\Infrastructure\Inertia\ViewModel\Admin;

use Karaev\Booking\Domain\Models\Resource\StatusResourceOptions;
use Karaev\Common\Infrastructure\Inertia\ViewModel\Admin\Grid\Column;
use Karaev\Common\Infrastructure\Inertia\ViewModel\Admin\AbstractGridViewModel;

class BookingGridPageViewModel extends AbstractGridViewModel
{

    public function build(): AbstractGridViewModel
    {
        return $this
            ->buildHeaderGrid()
            ->setEditLink('admin.booking.edit')
            ->setCreateLink('admin.booking.create')
            ->setComponent('Admin/Booking/Index');
    }

    private function buildHeaderGrid(): AbstractGridViewModel
    {
        return $this
            ->setColumn(new Column('id', 'ID', sortable: true))
            ->setColumn(new Column('start', 'Start Date', sortable: true))
            ->setColumn(new Column('finish', 'Finish Date', sortable: true))
            ->setColumn(new Column('status', 'Status', (new StatusResourceOptions())->getOptions()));
    }
}
