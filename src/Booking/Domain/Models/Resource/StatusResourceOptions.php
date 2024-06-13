<?php

declare(strict_types=1);

namespace Karaev\Booking\Domain\Models\Resource;

use Karaev\Common\Domain\Models\Resource\ResourceInterface;

class StatusResourceOptions implements ResourceInterface
{
    public function getOptions(): array
    {
        return [
            'on_approval' => 'On Approval',
            'approved' => 'Approved',
            'in_progress' => 'In Progress',
            'decline' => 'Decline',
            'finished' => 'Finished'
        ];
    }
}
