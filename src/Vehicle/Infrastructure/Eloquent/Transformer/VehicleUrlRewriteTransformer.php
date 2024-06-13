<?php

namespace Karaev\Vehicle\Infrastructure\Eloquent\Transformer;

use Karaev\Vehicle\Domain\Models\VehicleUrlRewrite as Domain;
use Karaev\Vehicle\Infrastructure\Eloquent\Model\VehicleUrlRewrite as Entity;

class VehicleUrlRewriteTransformer
{
    /**
     * @param Entity $entity
     * @return Domain
     */
    public function entityToDomain(Entity $entity): Domain
    {
        $domain = new Domain();
        $domain->id = $entity->id;
        $domain->vehicle_id = $entity->vehicle_id;
        $domain->url_rewrite = $entity->url_rewrite;

        return $domain;
    }

    /**
     * @param Domain $domain
     * @return Entity
     */
    public function domainToEntity(Domain $domain): Entity
    {
        $entity = Entity::findOrNew($domain->getId());
        $entity->id = $domain->getId();
        $entity->vehicle_id = $domain->vehicle_id;
        $entity->url_rewrite = $domain->url_rewrite;

        return $entity;
    }

    /**
     * @param array $variables
     * @return Domain
     */
    public function arrayToDomain(array $variables): Domain
    {
        $domain = new Domain();

        foreach ($variables as $key => $value) {
            $domain->setData($key, $value);
        }

        return $domain;
    }
}
