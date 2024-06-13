<?php

namespace Karaev\Common\Domain\Api\Data;

interface LocalizationInterface
{
    const ID = 'id';
    const CODE = 'code';
    const CURRENCY = 'currency';

    const EN_CODE = 'en';
    const RU_CODE = 'ru';
    const GE_CODE = 'ge';
    const TR_CODE = 'tr';

    const CODE_ENUM = [
        self::EN_CODE,
        self::RU_CODE,
        self::GE_CODE,
        self::TR_CODE
    ];
}
