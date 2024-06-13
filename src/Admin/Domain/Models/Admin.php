<?php

declare(strict_types=1);

namespace Karaev\Admin\Domain\Models;

use Karaev\Common\Domain\Models\AbstractModel;
use Karaev\Admin\Domain\Api\Data\AdminInterface;

class Admin extends AbstractModel implements AdminInterface
{
    public function getEmail(): string
    {
        return $this->getData(self::EMAIL);
    }

    public function setEmail(string $email): AdminInterface
    {
        $this->setData(self::EMAIL, $email);

        return $this;
    }

    public function getName(): string
    {
        return $this->getData(self::NAME);
    }

    public function setName(string $name): AdminInterface
    {
        $this->setData(self::NAME, $name);

        return $this;
    }
}
