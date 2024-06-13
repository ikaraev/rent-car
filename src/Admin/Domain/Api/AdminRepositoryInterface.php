<?php

namespace Karaev\Admin\Domain\Api;

use Karaev\Admin\Domain\Api\Data\AdminInterface;

interface AdminRepositoryInterface
{
    public function save(AdminInterface $admin);
}
