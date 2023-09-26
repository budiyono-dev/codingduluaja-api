<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use App\Models\MenuParent;
use App\Models\MenuItem;

return new class extends Migration
{

    public function up(): void
    {
        $menuApplication = new MenuParent(
            [
                'name' => 'menu.parent.application',
                'sequence' => 1
            ]
        );

        $menuApplication->save();

        $itemAppResource = new MenuItem(
            [
                'menu_parent_id' => $menuApplication->id,
                'name' => 'menu.item.app_resource',
                'page' => 'page.appResource',
                'sequence' => 1
            ]
        );

        $itemAppResource->save();

        $itemAppClient = new MenuItem(
            [
                'menu_parent_id' => $menuApplication->id,
                'name' => 'menu.item.client_app',
                'page' => 'page.appClient',
                'sequence' => 2
            ]
        );

        $itemAppClient->save();
    }

    public function down(): void
    {
        $menu1 = MenuParent::where('sequence', 1)->first();
        
        $subMenus = MenuItem::where('menu_parent_id', $menu1->id);
        $subMenus->delete();
    }
};
