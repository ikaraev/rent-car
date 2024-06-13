<?php

namespace Karaev\Vehicle\Infrastructure\Eloquent\Model;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractVehicleModel extends Model
{
    protected array $duplicateAttributes = [
        'id',
        'created_at',
        'updated_at'
    ];

    private array $data = [];

    public function setData($property, $value): self
    {
        $this->data[$property] = $value;

        return $this;
    }

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

        if ($this->relationLoaded('localizations') &&
            isset($this->localizations[0]) &&
            array_key_exists($key, $this->localizations[0]->getAttributes())
        ) {
            return $this->localizations[0]->getAttribute($key);
        }

        if ($this->relationLoaded('urlRewrite') &&
            $this->urlRewrite &&
            array_key_exists($key, (array)$this->urlRewrite->getAttributes())
        ) {
            return $this->urlRewrite->getAttribute($key);
        }

        return parent::__get($key);
    }

    public function getData(?string$property = null): mixed
    {
        if ($property === null) {

            if ($this->relationLoaded('properties')) {
                $this->data = array_merge($this->data, (array)$this->properties?->getAttributes());
            }

            if ($this->relationLoaded('localizations')) {
                $this->data = array_merge($this->data, isset($this->localizations[0]) ? (array)$this->localizations[0]?->getAttributes() : []);
            }

            if ($this->relationLoaded('urlRewrite')) {
                $this->data = array_merge($this->data, (array)$this->urlRewrite?->getAttributes());
            }

            if ($this->relationLoaded('images')) {
                $this->data = array_merge($this->data, ['images' => $this->images?->all()]);
            }

            return array_merge($this->data, $this->getAttributes());
        }

        return $this->data[$property] ?? null;
    }
}
