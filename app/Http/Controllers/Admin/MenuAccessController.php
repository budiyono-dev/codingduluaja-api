<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuAccess;
use App\Models\MenuItem;
use App\Models\MenuParent;
use App\Models\UserMenuAccess;
use Illuminate\Http\Request;

class MenuAccessController extends Controller
{
    public function pageMenuAccess()
    {
        $userMenuAccess = UserMenuAccess::all();
        $menuParent = MenuParent::all();
        $menuItem = MenuItem::all();

        return view('page.admin.menu-access', [
            'userMenuAccess' => $userMenuAccess,
            'menuParent' => $menuParent,
            'menuItem' => $menuItem
        ]);
    }

    public function getActiveMenuAccess(int $userMenuAccessId)
    {

        return null;
    }
}
