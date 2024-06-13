<?php

namespace Karaev\Admin\Infrastructure\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use Karaev\Admin\Application\Command\CreateAdminCommand;
use Karaev\Admin\Domain\Api\Data\AdminInterface;
use Karaev\Admin\Domain\Api\Data\AdminPasswordInterface;

class CreateAdminUser extends Command
{
    private const SUCCESS_MESSAGE = 'Admin has been created successful!';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create an admin user';

    public function __construct(private CreateAdminCommand $createAdminCommand)
    {
        parent::__construct();
    }

    public function handle(): void
    {
        $inputs = [
            AdminInterface::NAME => $this->ask('Name'),
            AdminInterface::EMAIL => $this->ask('Email')
        ];

        $password = $this->secret('Password');

        $inputs['password'] = $password;

        try {

            $this->createAdminCommand->handler($inputs);

            $this->info(__(self::SUCCESS_MESSAGE));
        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }
}
