<?php

declare(strict_types=1);

namespace Karaev\Vehicle\Domain\Models\Resource;

use Karaev\Common\Domain\Models\Resource\ResourceInterface;

class EngineResourceOptions implements ResourceInterface
{
    public function getOptions(): array
    {
        return [
            'gasoline' => 'Gasoline',
            'diesel' => 'Diesel',
            'hybrid' => 'Electro/Hybrid'
        ];
    }
}
