<?php

namespace App\Helper;

use App\Constants\UserRole as ConstantsUserRole;
use App\Models\MenuAccessDetail;
use App\Models\MenuParent;
use App\Models\MenuItem;
use App\Models\User;
use App\Models\UserMenuAccess;
use App\Models\MenuAccess;
use App\Models\UserRole;
use Illuminate\Support\Facades\Hash;

class MigrationUtils
{
    public static function addMenuParent(int $id, string $name, int $sequence): MenuParent
    {
        $menu = new MenuParent();
        $menu->id = $id;
        $menu->name = $name;
        $menu->sequence = $sequence;

        $menu->save();

        return $menu;
    }

    public static function addMenuItem(int $id, int $menuParentId, string $name, string $page, int $sequence): MenuItem
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

    public static function addUser(string $name, string $username, string $roleCode, string $email): void
    {
        $user = new User();
        $user->name = $name;
        $user->username = $username;
        $user->role_code = $roleCode;
        $user->email = $email;
        $user->password = Hash::make(config('app.default_password'));
        $user->markEmailAsVerified();
    }

    public static function addUserAdmin(string $name, string $username, string $email): void
    {
        self::addUser($name, $username, ConstantsUserRole::admin()->getCode(), $email);
    }

    public static function addUserUser(string $name, string $username, string $email): void
    {
        self::addUser($name, $username, ConstantsUserRole::user()->getCode(), $email);
    }

    public static function addUserOps(string $name, string $username, string $email): void
    {
        self::addUser($name, $username, ConstantsUserRole::ops()->getCode(), $email);
    }

    public static function addUserSu(string $name, string $username, string $email): void
    {
        self::addUser($name, $username, ConstantsUserRole::superUser()->getCode(), $email);
    }

    public static function addMenuAccess(string $name, string $description): MenuAccess
    {
        $userMenuAccess = new MenuAccess();
        $userMenuAccess->name = $name;
        $userMenuAccess->description = $description;
        $userMenuAccess->save();

        return $userMenuAccess;
    }

    public static function addMenuAccessDetail(int $menuAccessId, array $items): void
    {
        $listMenuItem = MenuItem::select('id')->orderBy('id')->get()->pluck('id')->all();
        $cItems = collect($items);
        foreach ($listMenuItem as $item) {
            $enable = $cItems->contains($item);

            $dt = new MenuAccessDetail();
            $dt->menu_access_id = $menuAccessId;
            $dt->menu_item_id = $item;
            $dt->enabled = $enable;
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

    public static function addUserRole(string $code, string $name): void
    {
        $r = new UserRole();
        $r->code = $code;
        $r->name = $name;
        $r->save();
    }
}
