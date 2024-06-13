<?php

namespace Karaev\Admin\Domain\Api\Data;

interface AdminInterface
{
    public const EMAIL = 'email';
    public const NAME = 'name';

    public function getEmail(): string;

    public function setEmail(string $email): self;

    public function getName(): string;

    public function setName(string $name): self;
}
