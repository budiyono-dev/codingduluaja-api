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

        MigrationUtils::addMenuItem(1, $adminMenu->id, 'menu.item.admin_menu_access', 'page.admin.menuAccess', 1);
        MigrationUtils::addMenuItem(2, $adminMenu->id, 'menu.item.admin_migration', 'page.admin.migration', 2);
        MigrationUtils::addMenuItem(3, $adminMenu->id, 'menu.item.admin_logging', 'page.admin.logging', 3);
        MigrationUtils::addMenuItem(4, $adminMenu->id, 'menu.item.admin_site', 'page.admin.site', 4);

        MigrationUtils::addMenuItem(5, $menuApplication->id, 'menu.item.app_resource', 'page.appResource', 1);
        MigrationUtils::addMenuItem(6, $menuApplication->id, 'menu.item.client_app', 'page.app.client', 2);
        MigrationUtils::addMenuItem(7, $menuApplication->id, 'menu.item.app_manager', 'page.appManager', 3);

        MigrationUtils::addMenuItem(8, $menuResourceManager->id, 'menu.item.res_todolist', 'page.res.todolist', 1);
        MigrationUtils::addMenuItem(9, $menuResourceManager->id, 'menu.item.res_wilayah_bps', 'page.res.wilayahBps', 2);
        MigrationUtils::addMenuItem(10,
            $menuResourceManager->id, 'menu.item.res_wilayah_dagri', 'page.res.wilayahDagri', 3
        );
        MigrationUtils::addMenuItem(11, $menuResourceManager->id, 'menu.item.res_user_api', 'page.res.userApi', 4);

        MigrationUtils::addMenuItem(12, $menuDocumentation->id, 'menu.item.doc_todolist', 'page.doc.todolist', 1);
        MigrationUtils::addMenuItem(13, $menuDocumentation->id, 'menu.item.doc_wilayah_bps', 'page.doc.wilayahBps', 2);

        MigrationUtils::addMenuItem(14,
            $menuDocumentation->id, 'menu.item.doc_wilayah_dagri', 'page.doc.wilayahDagri', 3
        );
        MigrationUtils::addMenuItem(15, $menuDocumentation->id, 'menu.item.doc_user_api', 'page.doc.userApi', 4);

        MigrationUtils::addMenuItem(16, $menuTools->id, 'menu.item.tools_base64', 'page.tools.base64', 1);

    }

    public function down(): void
    {
        MigrationUtils::deleteMenuParentByIds([1, 2, 3, 4, 5]);
        MigrationUtils::deleteMenuItemByIds([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]);
    }
};
