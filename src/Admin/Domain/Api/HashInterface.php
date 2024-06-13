<?php

namespace Karaev\Admin\Domain\Api;

interface HashInterface
{
    /**
     * @param string $value
     * @return string
     */
    public function make(string $value): string;

    /**
     * @param string $value
     * @param string $hashedValue
     * @return bool
     */
    public function check(string $value, string $hashedValue): bool;
}
