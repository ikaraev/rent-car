<?php

namespace Karaev\Admin\Infrastructure\Services;

use Karaev\Admin\Domain\Api\SaltGeneratorInterface;

class SaltGeneratorService implements SaltGeneratorInterface
{

    public function generate(string $initialKey): string
    {
        return hash('sha256', $initialKey);
    }
}
