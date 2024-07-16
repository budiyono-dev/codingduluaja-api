<?php

use App\Constants\UserRole;
use App\Helper\MigrationUtils;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            [1,2,3]
        );

        MigrationUtils::addUserMenuAccess($admin, $menuAccess1->id);
    }

    public function down(): void
    {
        // Schema::dropIfExists('menu_access_details');
    }
};
