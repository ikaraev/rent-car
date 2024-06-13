<?php

declare(strict_types=1);

namespace Karaev\Booking\Infrastructure\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Karaev\Booking\Infrastructure\DTO\SendEmailDTO;

class BookingSuccessEmailNotification extends Mailable
{
    use Queueable, SerializesModels;

    private const CONTENT_VARIABLE = 'content';

    public function __construct(public SendEmailDTO $sendEmailDTO) {}

    /**
     * @return BookingSuccessEmailNotification
     */
    public function build()
    {
        $content = $this->sendEmailDTO->toArray();

        return $this->subject($this->sendEmailDTO->getSubject())
            ->view('booking::emails.successEmailNotification')
            ->with([
                self::CONTENT_VARIABLE => $content
            ]);
    }
}
