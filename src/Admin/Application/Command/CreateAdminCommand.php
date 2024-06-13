<?php

namespace Karaev\Admin\Application\Command;

use Karaev\Admin\Application\Handler\Admin\SaveAdminHandler;
use Karaev\Admin\Domain\Api\SaltGeneratorInterface;
use Karaev\Admin\Domain\Models\Admin;
use Karaev\Admin\Domain\Api\Data\AdminInterface;
use Karaev\Admin\Domain\Api\Data\AdminPasswordInterface;
use Karaev\Admin\Domain\Api\HashInterface;

class CreateAdminCommand
{
    public function __construct(
        private SaveAdminHandler $saveAdminHandler,
        private SaltGeneratorInterface $saltGenerator,
        private HashInterface $hash
    ) {}

    /**
     * @param array $parameters
     * @return mixed
     */
    public function handler(array $parameters)
    {
        $admin = new Admin();

        $salt = $this->saltGenerator->generate($parameters[AdminInterface::NAME]);
        $hash = $this->hash->make((string)$parameters['password'] . $salt);

        $admin
            ->setName($parameters[AdminInterface::NAME])
            ->setEmail($parameters[AdminInterface::EMAIL])
            ->setData(AdminPasswordInterface::HASH, $hash)
            ->setData(AdminPasswordInterface::SALT, $salt);

        return $this->saveAdminHandler->handler($admin);
    }
}
