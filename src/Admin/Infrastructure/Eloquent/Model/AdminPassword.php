<?php

namespace Karaev\Admin\Infrastructure\Eloquent\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Karaev\Admin\Domain\Api\Data\AdminPasswordInterface;

class AdminPassword extends Model
{
    public function getAttributeList(): array
    {
        return [
            AdminPasswordInterface::ADMIN_ID,
            AdminPasswordInterface::IS_ACTIVE,
            AdminPasswordInterface::SALT,
            AdminPasswordInterface::HASH
        ];
    }

    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }
}
