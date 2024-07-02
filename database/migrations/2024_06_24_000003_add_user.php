<?php

use App\Helper\MigrationUtils;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        MigrationUtils::addUserAdmin('Admin Satu', 'admin1', 'admin1@codingduluaja.com');
        MigrationUtils::addUserUser('Tester Satu', 'tester1', 'tester1@codingduluaja.com');
        MigrationUtils::addUserSu('Admin Super', 'adminsu', 'adminsu1@codingduluaja.com');
        MigrationUtils::addUserOps('Admin Ops', 'operation1', 'ops1@codingduluaja.com');
    }

    public function down(): void
    {
        // data willbe wipeout when refresh
    }
};
