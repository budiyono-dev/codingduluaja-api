<?php

use App\Helper\MigrationUtils;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        $adminMenu = MigrationUtils::addMenuParent(1, 'menu.parent.admin', 1);
        $menuApplication = MigrationUtils::addMenuParent(2, 'menu.parent.application', 2);
        $menuResourceManager = MigrationUtils::addMenuParent(3, 'menu.parent.resourceManager', 3);
        $menuDocumentation = MigrationUtils::addMenuParent(4, 'menu.parent.documentation', 4);
        $menuTools = MigrationUtils::addMenuParent(5, 'menu.parent.tools', 5);

        MigrationUtils::addMenuItem(1, $adminMenu->id, 'menu.item.admin_menu_access', 'admin.menuAccess', 1);
        MigrationUtils::addMenuItem(2, $adminMenu->id, 'menu.item.admin_migration', 'admin.migration', 2);
        MigrationUtils::addMenuItem(3, $adminMenu->id, 'menu.item.admin_logging', 'admin.logging', 3);
        MigrationUtils::addMenuItem(4, $adminMenu->id, 'menu.item.admin_site', 'admin.site', 4);

        MigrationUtils::addMenuItem(5, $menuApplication->id, 'menu.item.app_client', 'app.client', 1);
        MigrationUtils::addMenuItem(6, $menuApplication->id, 'menu.item.app_resource', 'app.resource', 2);
        MigrationUtils::addMenuItem(7, $menuApplication->id, 'menu.item.app_manager', 'app.manager', 3);

        MigrationUtils::addMenuItem(8, $menuResourceManager->id, 'menu.item.res_todolist', 'res.todolist', 1);
        MigrationUtils::addMenuItem(9, $menuResourceManager->id, 'menu.item.res_wilayah_bps', 'res.wilayahBps', 2);
        MigrationUtils::addMenuItem(10, $menuResourceManager->id, 'menu.item.res_wilayah_dagri', 'res.wilayahDagri', 3);
        MigrationUtils::addMenuItem(11, $menuResourceManager->id, 'menu.item.res_user_api', 'res.userApi', 4);

        MigrationUtils::addMenuItem(12, $menuDocumentation->id, 'menu.item.doc_todolist', 'doc.todolist', 1);
        MigrationUtils::addMenuItem(13, $menuDocumentation->id, 'menu.item.doc_wilayah_bps', 'doc.wilayahBps', 2);
        MigrationUtils::addMenuItem(14, $menuDocumentation->id, 'menu.item.doc_wilayah_dagri', 'doc.wilayahDagri', 3);
        MigrationUtils::addMenuItem(15, $menuDocumentation->id, 'menu.item.doc_user_api', 'doc.userApi', 4);

        MigrationUtils::addMenuItem(16, $menuTools->id, 'menu.item.tools_base64', 'tools.base64', 1);

    }

    public function down(): void
    {
        MigrationUtils::deleteMenuParentByIds([1, 2, 3, 4, 5]);
        MigrationUtils::deleteMenuItemByIds([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]);
    }
};
