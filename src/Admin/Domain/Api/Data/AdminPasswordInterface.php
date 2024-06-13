<?php

namespace Karaev\Admin\Domain\Api\Data;

interface AdminPasswordInterface
{
    public const ADMIN_ID = 'admin_id';
    public const SALT = 'salt';
    public const HASH = 'hash';
    public const IS_ACTIVE = 'is_active';

    public function getAdminId(): int;

    public function setAdminId(int $adminId): self;

    public function getSalt(): string;

    public function setSalt(string $salt): self;

    public function getHash(): string;

    public function setHash(string $hash): self;

    public function getIsActive(): bool;

    public function setIsActive(bool $isActive): self;
}
