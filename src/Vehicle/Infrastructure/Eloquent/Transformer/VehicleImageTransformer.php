<?php

namespace Karaev\Vehicle\Infrastructure\Eloquent\Transformer;

use Karaev\Vehicle\Domain\Models\VehicleImage as Domain;
use Karaev\Vehicle\Infrastructure\Eloquent\Model\VehicleImage as Entity;

class VehicleImageTransformer
{

    /**
     * @param \Karaev\Vehicle\Domain\Models\Vehicle $domain
     * @return Entity
     */
    public function domainToEntity(Domain $domain): Entity
    {
        $entity = Entity::findOrNew($domain->getId());
        $entity->id = $domain->getId();
        $entity->vehicle_id = $domain->vehicle_id;
        $entity->sort_order = (int)$domain->sort_order;
        $entity->name = $domain->name;
        $entity->type = $domain->type;

        return $entity;
    }

    public function arrayToDomain(array $variables): Domain
    {
        $domain = new Domain();

        foreach ($variables as $key => $value) {
            $domain->setData($key, $value);
        }

        return $domain;
    }
}
