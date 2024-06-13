<?php

namespace Karaev\Admin\Infrastructure\Components\Sidebar;

interface Element
{
    public function getSortOrder(): int;

    public function setSortOrder(int $sortOrder): self;

    public function getCode(): string;

    public function setCode(string $code): self;

    public function getTitle(): string;

    public function setIconCss(string $css): self;

    public function getIconCss(): string;

    public function setTitle(string $title): self;

    public function getLink(): string;

    public function setLink(string $link): self;

    public function addSubMenu(Element $element): self;
}
