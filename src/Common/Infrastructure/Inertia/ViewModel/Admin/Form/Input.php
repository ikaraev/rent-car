<?php

declare(strict_types=1);

namespace Karaev\Common\Infrastructure\Inertia\ViewModel\Admin\Form;

use Illuminate\Contracts\Support\Arrayable;

class Input implements Arrayable
{
    public function __construct(
        private string $name,
        private string $title,
        private string $type,
        private array $options = [],
        private string $backendType = ''
    ) {}

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function setOptions(array $options): self
    {
        $this->options = $options;

        return $this;
    }

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'name' => $this->name,
            'type' => $this->type,
            'options' => $this->options,
            'backendType' => $this->backendType
        ];
    }
}
