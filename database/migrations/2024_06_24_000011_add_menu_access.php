<?php

use App\Constants\UserRole;
use App\Helper\MigrationUtils;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        $menuAccess1 = MigrationUtils::addMenuAccess('admin', 'admin menu access');
        MigrationUtils::addMenuAccessDetail($menuAccess1->id, [1, 2, 3, 4]);
        MigrationUtils::addUserMenuAccess(UserRole::admin()->getCode(), $menuAccess1->id);

        $menuAccessUser = MigrationUtils::addMenuAccess('user', 'user menu access');
        MigrationUtils::addMenuAccessDetailUser($menuAccessUser->id, []);
        MigrationUtils::addUserMenuAccess(UserRole::user()->getCode(), $menuAccessUser->id);
    }

    public function down(): void
    {
        // not rollbackable
    }
};
