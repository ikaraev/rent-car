<?php

declare(strict_types=1);

namespace Karaev\Vehicle\Infrastructure\Services;

class DecodeStringFilter
{
    public function convertString(?string $stringRequest)
    {
        if (!$stringRequest) {
            return [];
        }

        $baseDecode = base64_decode($stringRequest);

        return json_decode($baseDecode, true);
    }
}
