<?php

declare(strict_types=1);

namespace Karaev\Vehicle\Domain\Models\Resource;

use Karaev\Common\Domain\Models\Resource\ResourceInterface;

class IsActiveResourceOptions implements ResourceInterface
{
    public function getOptions(): array
    {
        return [0 => 'No', 1 => 'Yes'];
    }
}
