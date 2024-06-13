<?php

namespace Karaev\Common\Infrastructure\Inertia\ViewModel\Admin;

use Karaev\Common\Infrastructure\Inertia\ViewModel\Admin\Form\FormBuilder;

interface FormInterface
{
    public function schema(): FormBuilder;
}
