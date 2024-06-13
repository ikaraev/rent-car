<?php

namespace Karaev\Booking\Infrastructure\Eloquent\Transformer;

use Karaev\Booking\Domain\Models\Booking as Domain;
use Karaev\Booking\Domain\Models\BookingContactForm as ContactFormDomain;
use Karaev\Booking\Domain\Models\BookingProperties as PropertiesDomain;
use Karaev\Booking\Domain\Api\Data\BookingDataInterface;
use Karaev\Booking\Infrastructure\Eloquent\Model\Booking as Entity;

class BookingTransformer
{
    public function __construct(
        private BookingContactFormTransformer $bookingContactFormTransformer,
        private BookingPropertiesTransformer $bookingPropertiesTransformer,
    ) {}

    /**
     * @param Entity $entity
     * @return Domain
     */
    public function entityToDomain(Entity $entity): Domain
    {
        $domain = new Domain();

        if ($entity->contactForm) {
            $domain->setData('contactForm', $entity->contactForm->getAttributes());
            $entity->unsetRelation('contactForm');
        }

        if ($entity->properties) {
            $domain->setData('properties', $entity->properties->getAttributes());
            $entity->unsetRelation('properties');
        }

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

        if ($domain->getContactForm()) {
            $entity->setRelation('contactForm', $this->bookingContactFormTransformer->domainToEntity($domain->getContactForm()));
            $domain->unset(BookingDataInterface::CONTACT_FORM);
        }

        if ($domain->getProperties()) {
            $entity->setRelation('properties', $this->bookingPropertiesTransformer->domainToEntity($domain->getProperties()));
            $domain->unset(BookingDataInterface::PROPERTIES);
        }

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

        if (isset($variables[BookingDataInterface::CONTACT_FORM])) {
            $contactFormDomain = new ContactFormDomain();

            foreach ($variables[BookingDataInterface::CONTACT_FORM] as $key => $contactFormProperty) {
                $contactFormDomain->setData($key, $contactFormProperty);
            }

            $domain->setContactForm($contactFormDomain);
            unset($variables[BookingDataInterface::CONTACT_FORM]);
        }

        if (isset($variables[BookingDataInterface::PROPERTIES])) {
            $propertiesDomain = new PropertiesDomain();

            foreach ($variables[BookingDataInterface::PROPERTIES] as $key => $properties) {
                $propertiesDomain->setData($key, $properties);
            }

            $domain->setProperties($propertiesDomain);
            unset($variables[BookingDataInterface::PROPERTIES]);
        }

        foreach ($variables as $key => $value) {
            $domain->setData($key, $value);
        }

        return $domain;
    }
}
