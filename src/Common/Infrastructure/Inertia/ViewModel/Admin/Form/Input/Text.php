<?php

declare(strict_types=1);

namespace Karaev\Common\Infrastructure\Inertia\ViewModel\Admin\Form\Input;

class Text implements Input
{
    public const FIELD_TYPE = 'text';

    public function __construct(
        private string $name,
        private string $title
    ) {}

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'name' => $this->name,
            'type' => self::FIELD_TYPE,
        ];
    }
}
