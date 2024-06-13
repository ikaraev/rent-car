<?php

namespace Karaev\Admin\Application\Handler\Admin;

use Karaev\Admin\Domain\Api\AdminRepositoryInterface;
use Karaev\Admin\Domain\Api\Data\AdminInterface;

class SaveAdminHandler
{
    public function __construct(private AdminRepositoryInterface $adminUserRepository) {}

    public function handler(AdminInterface $admin)
    {
        return $this->adminUserRepository->save($admin);
    }
}
