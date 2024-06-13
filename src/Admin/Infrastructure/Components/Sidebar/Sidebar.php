<?php

namespace Karaev\Admin\Infrastructure\Components\Sidebar;

class Sidebar
{
    private array $menu = [];

    public static function make(): self
    {
        return new self();
    }

    public function add(Element $elementMenu)
    {
        $this->menu[$elementMenu->getCode()] = $elementMenu;

        return $this;
    }

    public function getElement(string $code): ?Element
    {
        return in_array($code, $this->menu) ? $this->menu[$code] : null;
    }

    public function sorting()
    {
        uasort($this->menu, function($a, $b) {
            return $a->getSortOrder() <=> $b->getSortOrder();
        });
    }

    public function toArray(): array
    {
        $result = [];

        foreach ($this->menu as $menu) {
            $result[] = $menu->toArray();
        }

        return $result;
    }
}
