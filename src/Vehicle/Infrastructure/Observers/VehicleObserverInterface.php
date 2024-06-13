<?php

namespace Karaev\Vehicle\Infrastructure\Observers;

interface VehicleObserverInterface
{
    public function getObservableAttributes(): array;
}
