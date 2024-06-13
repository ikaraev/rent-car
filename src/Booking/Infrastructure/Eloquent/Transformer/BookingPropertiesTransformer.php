<?php

namespace Karaev\Booking\Infrastructure\Eloquent\Transformer;

use Karaev\Booking\Domain\Models\BookingProperties as Domain;
use Karaev\Booking\Infrastructure\Eloquent\Model\BookingProperty as Entity;

class BookingPropertiesTransformer
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

        return $domain;
    }

    /**
     * @param Domain $domain
     * @return Entity
     */
    public function domainToEntity(Domain $domain): Entity
    {
        $entity = Entity::findOrNew($domain->getId());

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
