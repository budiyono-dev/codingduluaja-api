<?php

use App\Constants\TableName;
use App\Constants\UserRole;
use App\Helper\MigrationUtils;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        $admin = UserRole::admin();
        $su = UserRole::superUser();
        $ops = UserRole::ops();
        $user = UserRole::user();

        MigrationUtils::addUserRole($admin->getCode(), $admin->getName());
        MigrationUtils::addUserRole($su->getCode(), $su->getName());
        MigrationUtils::addUserRole($ops->getCode(), $ops->getName());
        MigrationUtils::addUserRole($user->getCode(), $user->getName());
        
    }

    public function down(): void
    {
        // data willbe wipeout when refresh
    }
};
