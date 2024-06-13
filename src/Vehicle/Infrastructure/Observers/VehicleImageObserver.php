<?php

namespace Karaev\Vehicle\Infrastructure\Observers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Karaev\Vehicle\Infrastructure\Eloquent\Model\Vehicle;
use Karaev\Vehicle\Domain\Models\VehicleImage as Domain;
use Karaev\Vehicle\Infrastructure\Eloquent\Transformer\VehicleImageTransformer;
use Karaev\Vehicle\Infrastructure\Eloquent\Repository\VehicleImageRepository;

class VehicleImageObserver
{
    public function __construct(
        private VehicleImageTransformer $vehicleImageTransformer,
        private VehicleImageRepository $vehicleImageRepository
    ) {}

    public function saving(Vehicle $vehicle)
    {
        $this->handleRemovedImages($vehicle);
        $this->handleAddedImages($vehicle);

        $vehicle->offsetUnset('images');
    }

    public function saved(Vehicle $vehicle)
    {
        foreach ($vehicle->getData('images') as $image) {
            if (!$image->id) {
                $image->vehicle_id = $vehicle->id;
                $image->save();
            }
        }
    }

    private function handleAddedImages(Vehicle $vehicle)
    {
        $added = $vehicle->images['added'] ?? [];

        $newImages = [];

        foreach ($added as $key => $newImage) {
            $publicPath = storage_path('app/public/images/' . basename($newImage['name']));

            if (!File::isDirectory(storage_path('app/public/images/'))) {
                File::makeDirectory(storage_path('app/public/images/'), 0777, true, true);
            }

            File::move(storage_path('tmp/upload/images/resource/' . basename($newImage['name'])), $publicPath);

            $domain = (new Domain())
                ->setName(ltrim(Storage::url('images/'), '/') . basename($newImage['name']) ?? '')
                ->setType($newImage['type'] ?? '')
                ->setVehicleId((int)$vehicle->id);

            $entity = $this->vehicleImageTransformer->domainToEntity($domain);

            $newImages[] = $entity;
        }

        $vehicle->setData('images', $newImages);
    }

    private function handleRemovedImages(Vehicle $vehicle)
    {
        $removed = $vehicle->images['removed'] ?? [];

        foreach ($removed as $image) {
            $id = $image['id'] ?? 0;

            if (!$id && file_exists(storage_path('tmp/upload/images/resource/') . $image['name'] ?? '')) {
                unlink(storage_path('tmp/upload/images/resource/') . $image['name']);

                continue;
            }

            $imageEntity = $this->vehicleImageRepository->getById($image['id'] ?? 0);

            if ($imageEntity->id) {
                $imageEntity->delete();
            }
        }
    }
}
