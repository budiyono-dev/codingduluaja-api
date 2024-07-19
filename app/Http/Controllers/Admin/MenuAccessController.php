<?php

namespace App\Http\Controllers\Admin;

use App\Constants\TableName;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateMenuAccessRequest;
use App\Http\Requests\EditMenuAccessRequest;
use App\Models\MenuAccess;
use App\Models\MenuAccessDetail;
use App\Models\MenuItem;
use App\Models\MenuParent;
use App\Models\UserMenuAccess;
use App\Services\MenuService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class MenuAccessController extends Controller
{
    public function __construct(
        protected MenuService $menuService
    ) {}

    public function index()
    {
        $menuAccess = MenuAccess::all();
        $maNamesAdmin = MenuAccess::where('name', '=', 'admin')->pluck('name')->first();
        $maNames = MenuAccess::where('name', '!=', 'admin')->select('name')->get()->pluck('name');

        $userMenuAccess = DB::table(TableName::USER_ROLE.' as ur')
            ->leftJoin(TableName::USER_MENU_ACCESS.' as uma', 'ur.code', '=', 'uma.role_code')
            ->leftJoin(TableName::MENU_ACCESS.' as ma', 'uma.menu_access_id', '=', 'ma.id')
            ->select('ur.code', 'ma.name', 'uma.created_at', 'uma.updated_at')
            ->get();

        return view('page.admin.menu-access', [
            'userMenuAccess' => $userMenuAccess,
            'menuAccess' => $menuAccess,
            'maNamesAdmin' => $maNamesAdmin,
            'maNames' => $maNames,
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
            'activatedMenu' => $activatedMenu,
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
                'description' => $req['txtDescription'] ?? '',
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

        $uma = UserMenuAccess::where('menu_access_id', $id)->first();
        if (! is_null($uma)) {
            return redirect()->route('page.admin.menuAccess')
                ->with('status', 'Delete Failed<br>User Access is in use|danger');
        }

        DB::transaction(function () use ($id) {
            $ma = MenuAccess::findOrFail($id);
            MenuAccessDetail::where('menu_access_id', $id)->delete();
            $ma->delete();
        });

        return redirect()->route('page.admin.menuAccess')->with('status', 'success delete menu access|primary');
    }

    public function doChangeUserMenuAccess(Request $request)
    {
        $req = $request->validate([
            'txtMenuAccess' => 'required|string|exists:menu_access,name',
            'txtRoleCode' => 'required|string|exists:user_role,code',
        ]);

        $uma = UserMenuAccess::where('role_code', $req['txtRoleCode'])->first();
        $ma = MenuAccess::where('name', $req['txtMenuAccess'])->first();
        if (is_null($ma) || $ma->count() <= 0) {
            abort(404);
        }

        DB::transaction(function () use ($uma, $req, $ma) {
            if (is_null($uma) || $uma->count() <= 0) {
                $uma = new UserMenuAccess();
                $uma->role_code = $req['txtRoleCode'];
            }
            $uma->menu_access_id = $ma->id;
            $uma->save();
        });

        return redirect()->route('page.admin.menuAccess')->with('success change menu access|primary');
    }

    public function pageCreate()
    {
        $activatedMenu = [];
        $menuParent = MenuParent::all();

        return view('page.admin.create-menu-access', [
            'menuParent' => $menuParent,
            'activatedMenu' => $activatedMenu,
        ]);
    }
}
