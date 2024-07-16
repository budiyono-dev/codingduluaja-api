<?php

namespace App\Http\Controllers\Admin;

use App\Constants\TableName;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateMenuAccessRequest;
use App\Http\Requests\EditMenuAccessRequest;
use App\Http\Requests\MenuAccessRequest;
use App\Models\MenuAccess;
use App\Models\MenuAccessDetail;
use App\Models\MenuItem;
use App\Models\MenuParent;
use App\Models\UserMenuAccess;
use App\Services\MenuService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\Foreach_;

class MenuAccessController extends Controller
{
    public function __construct(
        protected MenuService $MenuService
    ) {
    }

    public function index()
    {
        $menuAccess = MenuAccess::all();
        $menuParent = MenuParent::all();
        $menuItem = MenuItem::all();

        $userMenuAccess = DB::table(TableName::USER_ROLE . ' as ur')
            ->leftJoin(TableName::USER_MENU_ACCESS . ' as uma', 'ur.code', '=', 'uma.role_code')
            ->leftJoin(TableName::MENU_ACCESS . ' as ma', 'uma.menu_access_id', '=', 'ma.id')
            ->select('ur.code', 'ma.name', 'uma.created_at', 'uma.updated_at')
            ->get();

        return view('page.admin.menu-access', [
            'userMenuAccess' => $userMenuAccess,
            'menuAccess' => $menuAccess
        ]);
    }

    public function pageEdit(string $menuAccessId)
    {
        $menuAccess = MenuAccess::findOrFail($menuAccessId);
        $activatedMenu = [];
        foreach ($menuAccess->details as $detail) {
            if ($detail->enabled) {
                $activatedMenu[] = $detail->menu_item_id;
            }
        }
        $menuParent = MenuParent::all();
        return view('page.admin.edit-menu-access', [
            'menuAccess' => $menuAccess,
            'menuParent' => $menuParent,
            'activatedMenu' => $activatedMenu
        ]);
    }

    public function doEdit(EditMenuAccessRequest $request)
    {
        $req = $request->validated();
        $editedId = $req['id'];
        $cbItems = collect($req['cbItems'] ?? collect([]));

        $menuAccess = MenuAccess::findOrFail($editedId);
        $menuAccess->description = $req['txtDescription'];
        $menuAccess->save();

        $detail = $menuAccess->details;
        foreach ($detail as $d) {
            if ($d->menuItem->menu_parent_id === 1) {
                continue;
            }
            $d->enabled = $cbItems->contains($d->menu_item_id);
            $d->save();
        }
        Session::forget('LIST_MENU');
        return redirect()->route('page.admin.menuAccess');
    }

    public function doCreate(CreateMenuAccessRequest $request)
    {
        $req = $request->validated();
        $cbItems = collect($req['cbItems'] ?? collect([]));
        $listMenuItem = MenuItem::select('id')->orderBy('id')->get()->pluck('id')->all();

        DB::transaction(function () use ($req, $cbItems, $listMenuItem) {
            $menuAccess = MenuAccess::create([
                'name' => $req['txtName'],
                'description' => $req['txtDescription'] ?? ''
            ]);

            foreach ($listMenuItem as $item) {
                $dt = new MenuAccessDetail();
                $dt->menu_access_id = $menuAccess->id;
                $dt->menu_item_id = $item;
                $dt->enabled = $cbItems->contains($item);
                $dt->save();
            }
        });

        return redirect()->route('page.admin.menuAccess');
    }

    public function doDelete(int $id)
    {
        if ($id === 1) {
            abort(403);
        }
    }

    public function pageCreate()
    {
        $activatedMenu = [];
        $menuParent = MenuParent::all();
        return view('page.admin.create-menu-access', [
            'menuParent' => $menuParent,
            'activatedMenu' => $activatedMenu
        ]);
    }

    public function getActiveMenuAccess(int $userMenuAccessId)
    {
        $this->menuService->getActiveMenu();
        return $userId;
    }
}
