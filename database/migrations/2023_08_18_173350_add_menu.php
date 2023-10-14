<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use App\Models\MenuParent;
use App\Models\MenuItem;
use App\Helper\MigrationUtils;

return new class extends Migration
{

    public function up(): void
    {
        $menuApplication = MigrationUtils::insertMenuParent('menu.parent.application', 1);

        MigrationUtils::insertMenuItem($menuApplication->id, 'menu.item.app_resource', 'page.appResource', 1);
        MigrationUtils::insertMenuItem($menuApplication->id, 'menu.item.client_app', 'page.clientApp', 2);
        MigrationUtils::insertMenuItem($menuApplication->id, 'menu.item.app_manager', 'page.appManager', 3);

        $menuDocumentation = MigrationUtils::insertMenuParent('menu.parent.documentation', 2);
    }

    public function down(): void
    {
        MigrationUtils::deleteMenuParent(1);
    }
};
