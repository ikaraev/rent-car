<?php

declare(strict_types=1);

namespace Karaev\Common\Infrastructure\Inertia\ViewModel\Admin\Form;

use Illuminate\Contracts\Support\Arrayable;
use Karaev\Common\Infrastructure\Inertia\ViewModel\Admin\Form\Input\Input;

class FormBlock implements Arrayable
{
    private string $code;
    private string $title;
    private array $inputs = [];

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function addInput(Input $input): self
    {
        $this->inputs[] = $input;

        return $this;
    }

    public function toArray(): array
    {
        $inputs = [];

        foreach ($this->inputs as $input) {
            $inputs[] = $input->toArray();
        }

        return [
            'code' => $this->code,
            'title' => $this->title,
            'inputs' => $inputs
        ];
    }
}
