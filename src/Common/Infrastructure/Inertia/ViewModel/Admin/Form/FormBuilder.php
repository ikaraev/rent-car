<?php

namespace Karaev\Common\Infrastructure\Inertia\ViewModel\Admin\Form;

use Illuminate\Contracts\Support\Arrayable;
use Karaev\Common\Infrastructure\Inertia\ViewModel\Admin\Form\FormBlock;

class FormBuilder implements Arrayable
{
    private string $method = 'post';

    private array $formBlocks = [];

    public static function make(): self
    {
        return new self;
    }

    public function method(string $method): self
    {
        $this->method = $method;

        return $this;
    }

    public function addBlock(FormBlock $formBlock): self
    {
        $this->formBlocks[] = $formBlock;
        return $this;
    }

    public function toArray(): array
    {
        $result['method'] = $this->method;

        foreach ($this->formBlocks as $formBlock) {
            $result['blocks'][$formBlock->getCode()] = $formBlock->toArray();
        }

        return $result;
    }
}
