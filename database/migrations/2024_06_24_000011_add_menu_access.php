<?php

use App\Constants\UserRole;
use App\Helper\MigrationUtils;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        $admin = UserRole::admin()->getCode();

        $menuAccess1 = MigrationUtils::addMenuAccess(
            'admin',
            'admin menu access'
        );

        MigrationUtils::addMenuAccessDetail($menuAccess1->id,
            [1, 2, 3, 4]
        );

        MigrationUtils::addUserMenuAccess($admin, $menuAccess1->id);
    }

    public function down(): void
    {
        // not rollbackable
    }
};
