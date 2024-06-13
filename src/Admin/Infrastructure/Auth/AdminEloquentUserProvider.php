<?php

namespace Karaev\Admin\Infrastructure\Auth;

use Illuminate\Contracts\Auth\Authenticatable as UserContract;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Auth\EloquentUserProvider;

class AdminEloquentUserProvider extends EloquentUserProvider implements UserProvider
{
    public function validateCredentials(UserContract $user, array $credentials)
    {
        if (is_null($plain = $credentials['password'])) {
            return false;
        }

        return $this->hasher->check($plain . $user->salt, $user->getAuthPassword());
    }
}
