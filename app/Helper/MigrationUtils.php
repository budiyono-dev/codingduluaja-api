<?php

namespace App\Helper;

use App\Models\MenuAccessDetail;
use App\Models\MenuParent;
use App\Models\MenuItem;
use App\Models\User;
use App\Models\UserMenuAccess;

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

    public static function addUserMenuAccess(string $roleCode, int $menuAccessId): UserMenuAccess
    {
        $userMenuAccess = new UserMenuAccess();
        $userMenuAccess->role_code = $roleCode;
        $userMenuAccess->menu_access_id = $menuAccessId;
        $userMenuAccess->save();

        return $userMenuAccess;
    }

    public static function addUserMenuAccessDetail(int $menuAccessId, array $detail):void
    {
        foreach ($detail as $d) {
            
            $dt = new MenuAccessDetail();
            $dt->menu_access_id = $menuAccessId;
            $dt->parent_name = $d['parent_name'];
            $dt->parent_sequence = $d['parent_sequence'];
            $dt->item_name = $d['item_name'];
            $dt->item_page = $d['item_page'];
            $dt->item_sequence = $d['item_sequence'];

            $dt->save();
        }
    }
}
