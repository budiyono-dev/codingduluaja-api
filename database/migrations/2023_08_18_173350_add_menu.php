<?php

use Illuminate\Database\Migrations\Migration;
use App\Helper\MigrationUtils;

return new class extends Migration
{

    public function up(): void
    {
        $menuApplication = MigrationUtils::insertMenuParent(1, 'menu.parent.application', 1);
        $menuResourceManager = MigrationUtils::insertMenuParent(2, 'menu.parent.resourceManager', 2);
        $menuDocumentation = MigrationUtils::insertMenuParent(3, 'menu.parent.documentation', 3);
        $menuTools = MigrationUtils::insertMenuParent(4, 'menu.parent.tools', 4);

        
        MigrationUtils::insertMenuItem(1, $menuApplication->id, 'menu.item.app_resource', 'page.appResource', 1);
        MigrationUtils::insertMenuItem(2, $menuApplication->id, 'menu.item.client_app', 'page.clientApp', 2);
        MigrationUtils::insertMenuItem(3, $menuApplication->id, 'menu.item.app_manager', 'page.appManager', 3);

        
        MigrationUtils::insertMenuItem(4, $menuResourceManager->id, 'menu.item.res_todolist', 'page.res.todolist', 1);
        MigrationUtils::insertMenuItem(5, $menuResourceManager->id, 'menu.item.res_wilayah_bps', 'page.res.wilayahBps', 2);
        MigrationUtils::insertMenuItem(6,
            $menuResourceManager->id, 'menu.item.res_wilayah_dagri', 'page.res.wilayahDagri', 3
        );
        MigrationUtils::insertMenuItem(7, $menuResourceManager->id, 'menu.item.res_user_api', 'page.res.userApi', 4);
        

        MigrationUtils::insertMenuItem(8, $menuDocumentation->id, 'menu.item.doc_todolist', 'page.doc.todolist', 1);
        MigrationUtils::insertMenuItem(9, $menuDocumentation->id, 'menu.item.doc_wilayah_bps', 'page.doc.wilayahBps', 2);

        MigrationUtils::insertMenuItem(10,
            $menuDocumentation->id, 'menu.item.doc_wilayah_dagri', 'page.doc.wilayahDagri', 3
        );
        MigrationUtils::insertMenuItem(11, $menuDocumentation->id, 'menu.item.doc_user_api', 'page.doc.userApi', 4);
        

        MigrationUtils::insertMenuItem(12, $menuTools->id, 'menu.item.tools_base64', 'page.tools.base64', 1);


    }

    public function down(): void
    {
        MigrationUtils::deleteMenuParentByIds([1,2,3,4]);
        MigrationUtils::deleteMenuItemByIds([1,2,3,4,5,6,7,8,9,10,11]);
    }
};
