<?php

namespace Karaev\Admin\Domain\Api;

interface SaltGeneratorInterface
{
    public function generate(string $initialKey): string;
}
