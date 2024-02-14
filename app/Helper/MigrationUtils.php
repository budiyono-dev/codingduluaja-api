<?php

namespace App\Helper;

use App\Models\MenuParent;
use App\Models\MenuItem;

class MigrationUtils
{
    public static function insertMenuParent(string $name, int $sequence): MenuParent
    {
        $menu = new MenuParent(
            [
                'name' => $name,
                'sequence' => $sequence
            ]
        );

        $menu->save();

        return $menu;
    }

    public static function insertMenuItem(int $menuParentId, string $name, string $page, int $sequence): MenuItem
    {
        $item = new MenuItem(
            [
                'menu_parent_id' => $menuParentId,
                'name' => $name,
                'page' => $page,
                'sequence' => $sequence
            ]
        );

        $item->save();

        return $item;
    }

    public static function deleteMenuParent(int $sequence): void
    {
        $menu = MenuParent::where('sequence', $sequence)->first();

        $items = MenuItem::where('menu_parent_id', $menu->id);
        $items->delete();

        $menu->delete();
    }

}
