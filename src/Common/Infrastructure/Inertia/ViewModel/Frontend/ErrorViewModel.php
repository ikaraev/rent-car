<?php

namespace Karaev\Common\Infrastructure\Inertia\ViewModel\Frontend;

use Inertia\Inertia;

class ErrorViewModel extends FrontendLayoutViewModel
{
    private $code;

    public function setStatusCode($code): self
    {
        $this->code = $code;
        return $this;
    }

    public function render()
    {
        return match ($this->code) {
            404 => Inertia::render("Frontend/Error/404"),
            403 => Inertia::render("Frontend/Error/403"),
            500 => Inertia::render("Frontend/Error/500"),
            503 => Inertia::render("Frontend/Error/503"),
        };
    }
}
