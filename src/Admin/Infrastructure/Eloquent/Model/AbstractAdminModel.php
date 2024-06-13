<?php

namespace Karaev\Admin\Infrastructure\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

abstract class AbstractAdminModel extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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

        if ($this->relationLoaded('password') &&
            $this->password &&
            array_key_exists($key, $this->password->getAttributes())
        ) {
            return $this->password->getAttribute($key);
        }

        return parent::__get($key);
    }

    public function getData(?string$property = null): mixed
    {
        if ($property === null) {

            if ($this->relationLoaded('password')) {
                $this->data = array_merge($this->data, (array)$this->password?->getAttributes());
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
