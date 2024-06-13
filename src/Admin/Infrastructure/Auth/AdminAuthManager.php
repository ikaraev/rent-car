<?php

namespace Karaev\Admin\Infrastructure\Auth;

use Illuminate\Auth\AuthManager;

class AdminAuthManager extends AuthManager
{
    public function createUserProvider($provider = null)
    {
        if (is_null($config = $this->getProviderConfiguration($provider))) {
            return;
        }

        if (isset($this->customProviderCreators[$driver = ($config['driver'] ?? null)])) {
            return call_user_func(
                $this->customProviderCreators[$driver], $this->app, $config
            );
        }

        return $this->createAdminEloquentProvider($config);
    }

    private function createAdminEloquentProvider($config)
    {
        return new AdminEloquentUserProvider($this->app['hash'], $config['model']);
    }
}
