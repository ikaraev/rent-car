<?php

namespace Karaev\Common\Infrastructure\Service;

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
