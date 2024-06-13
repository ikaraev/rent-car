<?php

declare(strict_types=1);

namespace Karaev\Common\Infrastructure\Service\Api;

use Karaev\Common\Infrastructure\Jobs\ContactSendEmailJob;
use Karaev\Common\Infrastructure\DTO\ContactSendEmailDTO;

class ContactRequestService
{
    public function execute(ContactSendEmailDTO $contactSendRequest)
    {
        dispatch(new ContactSendEmailJob($contactSendRequest));
    }
}
