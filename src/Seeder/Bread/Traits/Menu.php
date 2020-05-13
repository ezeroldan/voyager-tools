<?php


namespace EzeRoldan\VoyagerTools\Seeder\Bread\Traits;

use TCG\Voyager\Models\Menu as MenuModel;
use TCG\Voyager\Models\MenuItem;

trait Menu
{
    protected $menu = null;
    protected $menuItem = null;
    protected $menuItemParent = null;

    protected function selectMenuItemParent(string $title): self
    {
        if (is_null($this->menuItemParent)) {
            $this->menuItemParent = MenuItem::where('menu_id', $this->getMenu()->id)->where('title', $title)->firstOrFail();
        }
        return $this;
    }

    protected function getMenu(): MenuModel
    {
        if (is_null($this->menu)) {
            $this->menu = MenuModel::where('name', 'admin')->firstOrFail();
        }
        return $this->menu;
    }

    protected function getMenuItemParent(): MenuItem
    {
        return $this->menuItemParent;
    }

    protected function isMenuItemParent(): bool
    {
        return ($this->menuItemParent instanceof MenuItem);
    }

    private function getMenuItem(): MenuItem
    {
        if (is_null($this->menuItem)) {
            $this->menuItem = new MenuItem();

            $this->menuItem->url = null;
            $this->menuItem->color = null;
            $this->menuItem->target = '_self';
            $this->menuItem->parameters = null;

            $this->menuItem->menu_id = $this->getMenu()->id;

            if ($this->isMenuItemParent()) {
                $this->menuItem->parent_id = $this->getMenuItemParent()->id;
                $this->menuItem->order = MenuItem::where('menu_id', $this->getMenu()->id)->where('parent_id', $this->getMenuItemParent()->id)->count();
            } else {
                $this->menuItem->order = MenuItem::where('menu_id', $this->getMenu()->id)->count();
            }

            $this->menuItem->order++;
        }
        return $this->menuItem;
    }

    protected function setMenuItemOrden(int $orden): self
    {
        $this->getMenuItem()->order = $orden;
        return $this;
    }
}
