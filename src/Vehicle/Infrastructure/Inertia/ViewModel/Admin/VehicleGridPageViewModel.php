<?php

declare(strict_types=1);

namespace Karaev\Vehicle\Infrastructure\Inertia\ViewModel\Admin;


use Karaev\Vehicle\Domain\Models\Resource\EngineResourceOptions;
use Karaev\Vehicle\Domain\Models\Resource\IsActiveResourceOptions;
use Karaev\Common\Infrastructure\Inertia\ViewModel\Admin\Grid\Column;
use Karaev\Common\Infrastructure\Inertia\ViewModel\Admin\AbstractGridViewModel;
use Karaev\Common\Infrastructure\Inertia\ViewModel\Admin\Filter\Filter;
use Karaev\Common\Infrastructure\Eloquent\Model\Filter\InputFilter;
use Karaev\Common\Infrastructure\Eloquent\Model\Filter\SearchFilter;
use Karaev\Common\Infrastructure\Eloquent\Model\Filter\SelectFilter;

class VehicleGridPageViewModel extends AbstractGridViewModel
{
    private array $incomeFilters;

    public function setIncomeFilters(array $incomeFilters): self
    {
        $this->incomeFilters = $incomeFilters;
        return $this;
    }

    public function build(): AbstractGridViewModel
    {
        return $this
            ->buildFilters()
            ->buildHeaderGrid()
            ->setComponent('Admin/Cars/Index')
            ->setCreateLink('admin.car.create')
            ->setEditLink('admin.car.edit');
    }

    private function buildHeaderGrid(): AbstractGridViewModel
    {
        return $this
            ->setColumn(new Column('id', 'ID'))
            ->setColumn(new Column('name', 'Name'))
            ->setColumn(new Column('car_number', 'Car Number'))
            ->setColumn(new Column('vin_code', 'vin_code'))
            ->setColumn(new Column('is_active', 'Is Active', (new IsActiveResourceOptions())->getOptions(), true)) /** TODO: change sortable in table ui */
            ->setColumn(new Column('engine', 'Engine'));
    }

    private function buildFilters(): AbstractGridViewModel
    {
        $filterUI = (new Filter())->setAction('admin.car.index');

        /** @var \Karaev\Common\Infrastructure\Eloquent\Model\Filter\AbstractFilter $filter */
        foreach ($this->getFilterList() as $filter) {
            $filter->setValue($this->extractFilterValue($filter));

            $filterUI->setFilter($filter);
        }

        return $this->setFilter($filterUI);
    }

    private function getFilterList()
    {
        return [
            new InputFilter('vehicle_id', 'ID', reference: 'properties'),
            new SearchFilter('car_number', 'Car Number', reference: 'properties'),
            new SearchFilter('vin_code', 'Vin Code', reference: 'properties'),
            new SearchFilter('name', 'Name', reference: 'properties'),
            new SelectFilter('is_active', 'IsActive', (new IsActiveResourceOptions())->getOptions(), reference: 'properties')
        ];
    }

    private function extractFilterValue($filter): mixed
    {
        foreach ($this->incomeFilters as $key => $incomeFilter) {
            foreach ($incomeFilter as $class => $params) {
                if ($params['name'] === $filter->getName() && $class === get_class($filter)) {
                    return $params['value'];
                }
            }
        }

        return null;
    }
}
