<?php

use App\Constants\TableName;
use App\Constants\UserRole;
use App\Helper\MigrationUtils;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $defaultPassword = config('cda.default_password');

        MigrationUtils::addUser(
            'admin1',
            UserRole::admin()->getCode(),
            'Admin1',
            '',
            'male',
            'admin1@codingduluaja.com',
            $defaultPassword
        );

        MigrationUtils::addUser(
            'adminsu',
            UserRole::superUser()->getCode(),
            'Admin',
            'Super',
            'male',
            'adminsu1@codingduluaja.com',
            $defaultPassword
        );

        MigrationUtils::addUser(
            'tester1',
            UserRole::user()->getCode(),
            'tester',
            'system',
            'male',
            'tester1@codingduluaja.com',
            $defaultPassword
        );

        MigrationUtils::addUser(
            'ops1',
            UserRole::ops()->getCode(),
            'operation',
            'system',
            'male',
            'ops1@codingduluaja.com',
            $defaultPassword
        );
    }

    public function down(): void
    {
        DB::table(TableName::USERS)
            ->whereIn(
                'username',
                ['admin1', 'adminsu', 'tester1', 'ops1', 'user1']
            )->delete();
    }
};
