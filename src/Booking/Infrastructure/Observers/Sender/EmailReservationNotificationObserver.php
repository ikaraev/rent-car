<?php

declare(strict_types=1);

namespace Karaev\Booking\Infrastructure\Observers\Sender;

use Karaev\Booking\Infrastructure\DTO\SendEmailDTO;
use Karaev\Booking\Infrastructure\Jobs\SendEmailJob;

class EmailReservationNotificationObserver
{
    /**
     * @param $event
     * @return void
     */
    public function handle($event): void
    {
        $sendEmailDTO = new SendEmailDTO([
            'booking' => $event,
            'subject' => 'Success booking',
        ]);

        dispatch(new SendEmailJob($sendEmailDTO));
    }
}
