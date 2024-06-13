<?php

namespace Karaev\Booking\Infrastructure\Eloquent\Model;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractBookingModel extends Model
{
    private array $data = [];

    protected array $duplicateAttributes = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function __get($key)
    {
        if (in_array($key, $this->duplicateAttributes) || $this->isRelation($key)) {
            return parent::__get($key);
        }

        if ($this->relationLoaded('properties') &&
            $this->properties &&
            array_key_exists($key, $this->properties->getAttributes())
        ) {
            return $this->properties->getAttribute($key);
        }

        if ($this->relationLoaded('contactForm') &&
            $this->contactForm &&
            array_key_exists($key, $this->contactForm->getAttributes())
        ) {
            return $this->contactForm->getAttribute($key);
        }

        return parent::__get($key);
    }

    public function getData(?string$property = null): mixed
    {
        if ($property === null) {

            if ($this->relationLoaded('properties')) {
                $this->data = array_merge($this->data, (array)$this->properties?->getAttributes());
            }

            if ($this->relationLoaded('contactForm')) {
                $this->data = array_merge($this->data, (array)$this->contactForm?->getAttributes());
            }

            return array_merge($this->data, $this->getAttributes());
        }

        return $this->data[$property] ?? null;
    }

    public function setData($property, $value): self
    {
        $this->data[$property] = $value;

        return $this;
    }
}
