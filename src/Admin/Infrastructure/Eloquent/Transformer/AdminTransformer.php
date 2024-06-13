<?php

namespace Karaev\Admin\Infrastructure\Eloquent\Transformer;

use Karaev\Admin\Domain\Models\Admin as Domain;
use Karaev\Admin\Infrastructure\Eloquent\Model\Admin as Entity;

class AdminTransformer
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
