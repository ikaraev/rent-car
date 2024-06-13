<?php

namespace Karaev\Admin\Infrastructure\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Inertia\Inertia;
use Karaev\Admin\Infrastructure\Auth\AdminAuthManager;
use Karaev\Admin\Infrastructure\Console\Commands\CreateAdminUser;
use Karaev\Admin\Infrastructure\Components\Sidebar\Sidebar;
use Karaev\Admin\Infrastructure\Components\Sidebar\ElementMenu;
use Illuminate\Contracts\Support\DeferrableProvider;

class AdminServiceProvider extends ServiceProvider
{
    public $bindings = [
        \Karaev\Admin\Domain\Api\AdminRepositoryInterface::class => \Karaev\Admin\Infrastructure\Eloquent\Repository\AdminRepository::class,
        \Karaev\Admin\Domain\Api\HashInterface::class => \Karaev\Admin\Infrastructure\Services\HashService::class,
        \Karaev\Admin\Domain\Api\SaltGeneratorInterface::class => \Karaev\Admin\Infrastructure\Services\SaltGeneratorService::class,
    ];

    public function register()
    {
        $this->app->singleton('adminauth', fn ($app) => new AdminAuthManager($app));
        $this->app->singleton(Sidebar::class, fn () => new Sidebar());
    }

    public function boot()
    {
//        JsonResource::withoutWrapping();
        $this->adminBoot();
    }

    private function adminBoot(): void
    {
        $this->registerConsoleCommands();
    }

    protected function registerConsoleCommands(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                CreateAdminUser::class
            ]);
        }
    }
}
