<?php

declare(strict_types=1);

namespace Karaev\Common\Infrastructure\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Karaev\Common\Infrastructure\DTO\ContactSendEmailDTO;

class ContactSendEmailNotification extends Mailable
{
    use Queueable, SerializesModels;

    private const CONTENT_VARIABLE = 'content';

    public function __construct(public ContactSendEmailDTO $sendEmailDTO) {}

    public function build()
    {
        $content = $this->sendEmailDTO->toArray();

        return $this->subject('New contact request!')
            ->view('common::emails.contactEmailNotification')
            ->with([
                self::CONTENT_VARIABLE => $content
            ]);
    }
}
