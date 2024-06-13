<?php

namespace Karaev\Admin\Infrastructure\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Karaev\Admin\Domain\Api\Data\AdminPasswordInterface;
use Laravel\Sanctum\HasApiTokens;

class Admin extends AbstractAdminModel
{
    protected $with = ['password'];

    public function getAuthPassword()
    {
        return $this->hash;
    }

    /**
     * @return HasOne
     */
    public function password(): HasOne
    {
        return $this->hasOne(AdminPassword::class)->where(AdminPasswordInterface::IS_ACTIVE, '=', true);
    }
}
