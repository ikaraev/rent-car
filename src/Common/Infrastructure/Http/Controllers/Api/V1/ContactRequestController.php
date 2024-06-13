<?php

namespace Karaev\Common\Infrastructure\Http\Controllers\Api\V1;

use Illuminate\Routing\Controller;
use Karaev\Common\Infrastructure\DTO\ContactSendEmailDTO;
use Karaev\Common\Infrastructure\Http\Request\Api\ContactSendRequest;
use Karaev\Common\Infrastructure\Http\Resources\Api\V1\SendContactResource;
use Karaev\Common\Infrastructure\Service\Api\ContactRequestService;

class ContactRequestController extends Controller
{
    public function execute(
        ContactSendRequest $contactSendRequest,
        ContactRequestService $contactRequestService
    ) {
        $contactRequestService->execute(new ContactSendEmailDTO($contactSendRequest->all()));

        return new SendContactResource($contactSendRequest);
    }
}
