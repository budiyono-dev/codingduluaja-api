<?php

namespace App\Http\Controllers\Admin;

use App\Constants\TableName;
use App\Http\Controllers\Controller;
use App\Models\MenuAccess;
use App\Models\MenuItem;
use App\Models\MenuParent;
use App\Models\UserMenuAccess;
use App\Services\MenuService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MenuAccessController extends Controller
{
    public function __construct(
        protected MenuService $MenuService
    ) {
    }

    public function pageMenuAccess()
    {
        // $userMenuAccess = UserMenuAccess::all();
        $menuParent = MenuParent::all();
        $menuItem = MenuItem::all();

        $userMenuAccess = DB::table(TableName::USER_ROLE . ' as ur')
            ->leftJoin(TableName::USER_MENU_ACCESS . ' as uma', 'ur.code', '=', 'uma.role_code')
            ->leftJoin(TableName::MENU_ACCESS.' as ma', 'uma.menu_access_id', '=', 'ma.id')
            ->select('ur.code', 'ma.name', 'uma.created_at', 'uma.updated_at')
            ->get();

        dd($userMenuAccess);

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
