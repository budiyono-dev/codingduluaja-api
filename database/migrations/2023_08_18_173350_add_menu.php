<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use App\Models\MenuParent;
use App\Models\MenuItem;

return new class extends Migration
{

    public function up(): void
    {
        $menuAppResource = new MenuParent(
            [
                'name' => 'menu.parent.app_resource',
                'page' => 'page.appResource'
            ]
        );

        $menuAppResource->save();

        $menuItemAppResource = new MenuItem(
            [
                'menu_parent_id' => $menuAppResource['id'],
                'name' => 'menu.item.create_app_resource',
                'page' => 'page.AppResource'
            ]
        );

        $menuItemAppResource->save();

        $menuAppClient = new MenuParent(
            [
                'name' => 'menu.parent.app_client',
                'page' => 'page.clientApp'
            ]
        );
    }

    public function down(): void
    {
        DB::table('users')->where('username', 'adminTest')->delete();
    }
};
