<?php

namespace Karaev\Admin\Infrastructure\Observers;

use Karaev\Admin\Infrastructure\Eloquent\Model\Admin;
use Karaev\Admin\Infrastructure\Eloquent\Model\AdminPassword;

class AdminPasswordObserver
{
    public function saving(Admin $admin)
    {
        $password = $admin->password ?? new AdminPassword();

        foreach ($password->getAttributeList() as $attribute) {
            if (array_key_exists($attribute, $admin->getAttributes())) {
                $password->{$attribute} = $admin->getAttribute($attribute);
                $admin->offsetUnset($attribute);
            }
        }
        $admin->setRelation('password', $password);
    }

    public function saved(Admin $admin)
    {
        $password = $admin->password;

        if (!$password || !count($password->getAttributes())) {
            return;
        }

        if (!$password?->admin_id) {
            $password->admin_id = $admin->id;
        }

        $password->save();
    }
}
