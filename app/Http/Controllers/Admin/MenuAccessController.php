<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuAccess;
use App\Models\MenuItem;
use App\Models\MenuParent;
use App\Models\UserMenuAccess;
use App\Services\MenuService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MenuAccessController extends Controller
{
    public function __construct(
        protected MenuService $MenuService
    ){}

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
        $this->menuService->getActiveMenu();
        return $userId;
    }
}
