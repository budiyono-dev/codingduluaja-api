<?php

use App\Helper\MigrationUtils;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        MigrationUtils::addMenuItem(21, 3, 'menu.item.res_raport_api', 'res.raport', 5);
        MigrationUtils::addMenuItem(22, 4, 'menu.item.doc_raport_api', 'doc.raport', 5);
    }

    public function down(): void
    {
        MigrationUtils::deleteMenuItemByIds([21, 22]);
    }
};
