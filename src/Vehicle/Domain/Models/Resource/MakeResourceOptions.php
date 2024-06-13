<?php

declare(strict_types=1);

namespace Karaev\Vehicle\Domain\Models\Resource;

use Karaev\Common\Domain\Models\Resource\ResourceInterface;

class MakeResourceOptions implements ResourceInterface
{

    public function getOptions(): array
    {
        return [
            'any' => 'Any',
            'automatic' => 'Automatic',
            'manual' => 'Manual'
        ];
    }
}
