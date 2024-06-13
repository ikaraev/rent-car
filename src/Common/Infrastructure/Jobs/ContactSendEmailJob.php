<?php

declare(strict_types=1);

namespace Karaev\Common\Infrastructure\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Karaev\Common\Infrastructure\DTO\ContactSendEmailDTO;
use Karaev\Common\Infrastructure\Mail\ContactSendEmailNotification;

class ContactSendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(public ContactSendEmailDTO $sendEmailDTO) {}

    public function handle(): void
    {
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactSendEmailNotification($this->sendEmailDTO));
    }
}
