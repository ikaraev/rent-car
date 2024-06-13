<?php

declare(strict_types=1);

namespace Karaev\Common\Infrastructure\Inertia\ViewModel\Admin\Form\Input;

class Select implements Input
{
    public const FIELD_TYPE = 'select';

    public function __construct(
        private string $name,
        private string $title,
        private array $options = [],
        private string $backendType = ''
    ) {}

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'name' => $this->name,
            'options' => $this->options,
            'backendType' => $this->backendType,
            'type' => self::FIELD_TYPE,
        ];
    }
}
