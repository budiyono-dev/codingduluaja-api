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

        $menuAccess1 = MigrationUtils::addUserMenuAccess($admin, 1);
        MigrationUtils::addUserMenuAccessDetail($menuAccess1->id, 
            [1,2,3,4,5,6]
        );
    }

    public function down(): void
    {
        // Schema::dropIfExists('menu_access_details');
    }
};
