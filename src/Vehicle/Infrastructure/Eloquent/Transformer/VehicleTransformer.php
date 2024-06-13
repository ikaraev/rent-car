<?php

declare(strict_types=1);

namespace Karaev\Vehicle\Infrastructure\Eloquent\Transformer;

use Karaev\Vehicle\Domain\Models\Vehicle as Domain;
use Karaev\Vehicle\Infrastructure\Eloquent\Model\Vehicle as Entity;

class VehicleTransformer
{
    /**
     * @param Entity $entity
     * @return Domain
     */
    public function entityToDomain(Entity $entity): Domain
    {
        $domain = new Domain();

        foreach ($entity->getData() as $key => $value) {
            $domain->setData($key, $value);
        }

        $domain->setLocale($entity->getLocale());

        return $domain;
    }

    /**
     * @param Domain $domain
     * @return Entity
     */
    public function domainToEntity(Domain $domain): Entity
    {
        $entity = Entity::findOrNew($domain->getId());

        $entity->setLocale($domain->getLocale() ? $domain->getLocale() : app()->getLocale());

        $domain->unset('locale');

        foreach ($domain->getData() as $key => $value) {
            $entity->setAttribute($key, $value);
        }

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
