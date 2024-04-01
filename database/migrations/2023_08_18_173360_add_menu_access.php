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
        MigrationUtils::addUserMenuAccessDetail($menuAccess1->id, [
            'parent_name' => '',
            'parent_sequence' => '',
            'item_name' => '',
            'item_page' => '',
            'item_sequence' => ''
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('menu_access_details');
    }
};
