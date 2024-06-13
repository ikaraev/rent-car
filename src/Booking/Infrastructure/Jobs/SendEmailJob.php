<?php

declare(strict_types=1);

namespace Karaev\Booking\Infrastructure\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;
use Karaev\Booking\Infrastructure\Mail\BookingSuccessEmailNotification;
use Karaev\Booking\Infrastructure\DTO\SendEmailDTO;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(private SendEmailDTO $emailDTO) {}

    public function handle(): void
    {
        $emailTo = $this->emailDTO->getBooking()->getContactForm()['email'];

        Mail::to($emailTo)->send(new BookingSuccessEmailNotification($this->emailDTO));
    }
}
