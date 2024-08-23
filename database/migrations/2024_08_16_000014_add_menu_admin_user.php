<?php

use App\Helper\MigrationUtils;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        MigrationUtils::addMenuItem(20, 1, 'menu.item.admin_user', 'admin.user', 7);
        MigrationUtils::attachMenuAccessDetail(1, [20]);
    }

    public function down(): void
    {
        MigrationUtils::deleteMenuItemByIds([20]);
        MigrationUtils::dettachMenuAccessDetail(1, [20]);
    }
};
