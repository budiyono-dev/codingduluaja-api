<?php

use App\Helper\MigrationUtils;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        MigrationUtils::addMenuItem(17, 1, 'menu.item.admin_optimize', 'admin.optimize', 5);
        MigrationUtils::attachMenuAccessDetail(1, [17]);
    }

    public function down(): void
    {
        MigrationUtils::deleteMenuItemByIds([17]);
        MigrationUtils::dettachMenuAccessDetail(1, [17]);
    }
};
