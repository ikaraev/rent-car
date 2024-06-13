<?php

declare(strict_types=1);

namespace Karaev\Admin\Domain\Models;

use Karaev\Common\Domain\Models\AbstractModel;
use Karaev\Admin\Domain\Api\Data\AdminPasswordInterface;

class AdminPassword extends AbstractModel implements AdminPasswordInterface
{
    public function getAdminId(): int
    {
        return $this->getData(self::ADMIN_ID);
    }

    public function setAdminId(int $adminId): self
    {
        $this->setData(self::ADMIN_ID, $adminId);

        return $this;
    }

    public function getSalt(): string
    {
        return $this->getData(self::SALT);
    }

    public function setSalt(string $salt): AdminPasswordInterface
    {
        $this->setData(self::SALT, $salt);

        return $this;
    }

    public function getHash(): string
    {
        return $this->getData(self::HASH);
    }

    public function setHash(string $hash): AdminPasswordInterface
    {
        $this->setData(self::HASH, $hash);

        return $this;
    }

    public function getIsActive(): bool
    {
        return (bool)$this->getData(self::IS_ACTIVE);
    }

    public function setIsActive(bool $isActive): AdminPasswordInterface
    {
        $this->setData(self::IS_ACTIVE, $isActive);

        return $this;
    }
}
