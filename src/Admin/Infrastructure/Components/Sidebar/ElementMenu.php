<?php

declare(strict_types=1);

namespace Karaev\Admin\Infrastructure\Components\Sidebar;

class ElementMenu implements Element
{
    private array $subMenu = [];
    private string $code = '';
    private string $title = '';
    private string $link = '';
    private string $iconCss = '';
    private int $sortOrder = 0;

    public static function make()
    {
        return new self();
    }

    public function getSortOrder(): int
    {
        return $this->sortOrder;
    }

    public function setSortOrder(int $sortOrder): self
    {
        $this->sortOrder = $sortOrder;
        return $this;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;
        return $this;
    }

    public function setTitle(string $title): Element
    {
        $this->title = $title;
        return $this;
    }

    public function setLink(string $link): Element
    {
        $this->link = $link;
        return $this;
    }

    public function addSubMenu(Element $element): self
    {
        $this->subMenu[$element->getCode()] = $element;

        return $this;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getLink(): string
    {
        return $this->link;
    }

    public function setIconCss(string $css): Element
    {
        $this->iconCss = $css;
        return $this;
    }

    public function getIconCss(): string
    {
        return $this->iconCss;
    }

    public function toArray()
    {
        return [
            'code' => $this->getCode(),
            'title' => $this->getTitle(),
            'link' => $this->getLink(),
            'icon_css' => $this->getIconCss()
        ];
    }
}
