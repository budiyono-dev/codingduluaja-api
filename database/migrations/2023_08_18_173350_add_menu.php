<?php

use Illuminate\Database\Migrations\Migration;
use App\Helper\MigrationUtils;

return new class extends Migration
{

    public function up(): void
    {
        $menuApplication = MigrationUtils::insertMenuParent('menu.parent.application', 1);

        MigrationUtils::insertMenuItem($menuApplication->id, 'menu.item.app_resource', 'page.appResource', 1);
        MigrationUtils::insertMenuItem($menuApplication->id, 'menu.item.client_app', 'page.clientApp', 2);
        MigrationUtils::insertMenuItem($menuApplication->id, 'menu.item.app_manager', 'page.appManager', 3);

        $menuResourceManager = MigrationUtils::insertMenuParent('menu.parent.resourceManager', 2);
        MigrationUtils::insertMenuItem($menuResourceManager->id, 'menu.item.res_todolist', 'page.res.todolist', 1);
        MigrationUtils::insertMenuItem($menuResourceManager->id, 'menu.item.res_wilayah_bps', 'page.res.wilayahBps', 2);
        MigrationUtils::insertMenuItem($menuResourceManager->id, 'menu.item.res_wilayah_dagri', 'page.res.wilayahDagri', 3);

        $menuDocumentation = MigrationUtils::insertMenuParent('menu.parent.documentation', 3);
        MigrationUtils::insertMenuItem($menuDocumentation->id, 'menu.item.doc_todolist', 'page.doc.todolist', 1);
        MigrationUtils::insertMenuItem($menuDocumentation->id, 'menu.item.doc_wilayah_bps', 'page.doc.wilayahBps', 2);
        MigrationUtils::insertMenuItem($menuDocumentation->id, 'menu.item.doc_wilayah_dagri', 'page.doc.wilayahDagri', 3);

        $menuDocumentation = MigrationUtils::insertMenuParent('menu.parent.tools', 4);
        MigrationUtils::insertMenuItem($menuDocumentation->id, 'menu.item.tools_base64', 'page.tools.base64', 1);
    }

    public function down(): void
    {
        MigrationUtils::deleteMenuParent(1);
        MigrationUtils::deleteMenuParent(2);
        MigrationUtils::deleteMenuParent(3);
    }
};
