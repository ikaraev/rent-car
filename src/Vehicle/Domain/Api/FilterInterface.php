<?php

namespace Karaev\Vehicle\Domain\Api;

interface FilterInterface
{
    public const FIELD = 'field';
    public const VALUE = 'value';
    public const CONDITION_TYPE = 'condition_type';

    public function initFilter(array $data): self;

    public function getField(): string;

    public function getName(): string;

    public function setName(string $name): self;

    public function getValue();

    public function setValue($value): self;

    public function getConditionType(): string;

    public function setConditionType(string $conditionType): self;

    public function getOptions();

    public function setOptions($options): self;
}
