<?php

declare(strict_types=1);

namespace Karaev\Common\Infrastructure\DTO;

use Illuminate\Contracts\Support\Arrayable;

class ContactSendEmailDTO implements Arrayable
{
    private string $email;
    private string $subject;
    private string $message;

    public function __construct(array $parameters)
    {
        $this->email = $parameters['email'] ?? '';
        $this->subject = $parameters['subject'] ?? '';
        $this->message = $parameters['message'] ?? '';
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getSubject()
    {
        return $this->subject;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function toArray(): array
    {
        return [
            'email' => $this->email,
            'subject' => $this->subject,
            'message' => $this->message
        ];
    }
}
