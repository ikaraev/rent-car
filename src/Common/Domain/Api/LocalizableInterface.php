<?php

namespace Karaev\Common\Domain\Api;

interface LocalizableInterface
{
    public function getLocale(): ?string;

    public function setLocale(string $locale): self;
}
