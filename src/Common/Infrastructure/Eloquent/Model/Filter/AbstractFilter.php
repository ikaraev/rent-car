<?php

namespace Karaev\Common\Infrastructure\Eloquent\Model\Filter;

use JsonSerializable;
use Karaev\Common\Domain\Api\FilterInterface;

abstract class AbstractFilter implements EloquentFilterInterface, FilterInterface, JsonSerializable
{
    public function __construct(
        private $name = null,
        private ?string $title = null,
        private ?array $options = [],
        private mixed $value = null,
        private string $conditionType = '=',
        private ?string $reference = null
    ) {}

    public function jsonSerialize(): mixed
    {
        return [
            'class' => get_class($this),
            'type' => $this->getField(),
            'name' => $this->getName(),
            'title' => $this->title,
            'value' => $this->value,
            'options' => $this->getOptions(),
            'reference' => $this->reference
        ];
    }

    public function getName(): string|array
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getOptions()
    {
        return $this->options;
    }

    public function setOptions($options): self
    {
        $this->options = $options;
        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value): FilterInterface
    {
        $this->value = $value;
        return $this;
    }

    public function getConditionType(): string
    {
        return $this->conditionType;
    }

    public function setConditionType(string $conditionType): FilterInterface
    {
        $this->conditionType = $conditionType;
        return $this;
    }

    protected function applyFilter($query): void
    {
        match($this->getConditionType()) {
            '=' => $query->where($this->getReference() . '.' . $this->getName(), $this->getValue()),
            '>' => $query->where($this->getReference() . '.' . $this->getName(), '>', $this->getValue()),
            'in' => $query->whereIn($this->getReference() . '.' . $this->getName(), $this->getOptions()),
            'between' => $this->buildBetweenFilter($query),
            'like' => $query->where($this->getReference() . '.' . $this->getName(), 'LIKE', '%'. $this->getValue() .'%'),
            'not between' => $query->whereNotBetween($this->getReference() . '.' . $this->getName(), $this->getValue()),
        };
    }

    public function toArray(): array
    {
        return [
            'class' => get_class($this),
            'type' => $this->getField(),
            'name' => $this->getName(),
            'title' => $this->title,
            'value' => $this->value,
            'options' => $this->getOptions(),
            'reference' => $this->reference
        ];
    }

    public function toFilterArray()
    {
        return [
            get_class($this) => [
                'name' => $this->name,
                'value' => $this->value,
                'reference' => $this->reference
            ]
        ];
    }

    protected function buildBetweenFilter($query)
    {
        if (isset($this->getValue()[0]) && isset($this->getValue()[1])) {
            return $query->whereBetween($this->getReference() . '.' . $this->getName(), $this->getValue());
        }

        if (isset($this->getValue()[0])) {
            return $query->where($this->getReference() . '.' . $this->getName(), '>=', $this->getValue()[0]);
        }

        if (isset($this->getValue()[1])) {
            return $query->where($this->getReference() . '.' . $this->getName(), '<=', $this->getValue()[1]);
        }
    }
}
