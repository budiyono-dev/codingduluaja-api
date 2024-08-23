<?php

use App\Helper\MigrationUtils;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        MigrationUtils::addMenuItem(19, 1, 'menu.item.admin_feedback', 'admin.feedback', 6);
        MigrationUtils::attachMenuAccessDetail(1, [19]);
    }

    public function down(): void
    {
        MigrationUtils::deleteMenuItemByIds([19]);
        MigrationUtils::dettachMenuAccessDetail(1, [19]);
    }
};
