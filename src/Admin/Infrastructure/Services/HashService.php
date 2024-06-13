<?php

namespace Karaev\Admin\Infrastructure\Services;

use Illuminate\Support\Facades\Hash;
use Karaev\Admin\Domain\Api\HashInterface;

class HashService implements HashInterface
{

    public function make(string $value): string
    {
        return Hash::make($value);
    }

    public function check(string $value, string $hashedValue): bool
    {
        return Hash::check($value, $hashedValue);
    }
}
