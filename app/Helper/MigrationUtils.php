<?php

namespace App\Helper;

use App\Models\MenuAccessDetail;
use App\Models\MenuParent;
use App\Models\MenuItem;
use App\Models\User;
use App\Models\UserMenuAccess;
use App\Models\MenuAccess;

class MigrationUtils
{
    public static function insertMenuParent(int $id, string $name, int $sequence): MenuParent
    {
        $menu = new MenuParent();
        $menu->id = $id;
        $menu->name = $name;
        $menu->sequence = $sequence;

        $menu->save();

        return $menu;
    }

    public static function insertMenuItem(int $id, int $menuParentId, string $name, string $page, int $sequence): MenuItem
    {
        $item = new MenuItem();
        $item->id = $id;
        $item->menu_parent_id = $menuParentId;
        $item->name = $name;
        $item->page = $page;
        $item->sequence = $sequence;

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

    public static function deleteMenuParentByIds(array $ids): void
    {
        MenuParent::whereIn('id', $ids)->delete();
    }
    
    public static function deleteMenuItemByIds(array $ids): void
    {
        MenuItem::whereIn('id', $ids)->delete();
    }

    public static function addUser(
        string $userName,
        string $roleCode,
        string $firstName,
        string $lastName,
        string $sex,
        string $email,
        string $password
    ): void
    {
        $user = new User([
            'username' => $userName,
            'role_code' => $roleCode,
            'first_name' => $firstName,
            'last_name' => $lastName,
            'sex' => $sex,
            'email' => $email,
            'password' => bcrypt($password)
        ]);
        $user->save();
    }

    public static function addMenuAccess(string $name, string $description): MenuAccess
    {
        $userMenuAccess = new MenuAccess();
        $userMenuAccess->name = $name;
        $userMenuAccess->description = $description;
        $userMenuAccess->save();

        return $userMenuAccess;
    }

    public static function addMenuAccessDetail(int $menuAccessId, array $items):void
    {
        foreach ($items as $item) {
            
            $dt = new MenuAccessDetail();
            $dt->menu_access_id = $menuAccessId;
            $dt->menu_item_id = $item;
            $dt->enabled = true;
            $dt->save();
        }
    }

    public static function addUserMenuAccess(string $roleCode, int $menuAccessId): void
    {
        $menuAccess = new UserMenuAccess();
        $menuAccess->role_code = $roleCode;
        $menuAccess->menu_access_id = $menuAccessId;

        $menuAccess->save();
    }
}
