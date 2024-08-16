<?php

use App\Helper\MigrationUtils;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        $feedback = MigrationUtils::addMenuParent(6, 'menu.parent.feedback', 6);
        MigrationUtils::addMenuItem(18, $feedback->id, 'menu.item.feedback_report', 'feedback.report', 1);
    }

    public function down(): void
    {
        MigrationUtils::deleteMenuItemByIds([18]);
        MigrationUtils::deleteMenuParentByIds([6]);
    }
};
