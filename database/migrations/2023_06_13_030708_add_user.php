<?php

use App\Constants\TableName;
use App\Constants\UserRole;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table(TableName::USERS)->insert(
            [
                [
                    'username' => 'admin1',
                    'role_code' => UserRole::admin()->getCode(),
                    'first_name' => 'Admin1',
                    'last_name' => '',
                    'sex' => 'male',
                    'email' => 'admin1@codingduluaja.com',
                    'password' => bcrypt('Admin#2024')
                ],
                [
                    'username' => 'adminsu',
                    'role_code' => UserRole::superUser()->getCode(),
                    'first_name' => 'Admin',
                    'last_name' => 'Super',
                    'sex' => 'male',
                    'email' => 'adminsu1@codingduluaja.com',
                    'password' => bcrypt('Admin#2024')
                ],
                [    'username' => 'tester1',
                    'role_code' => UserRole::user()->getCode(),
                    'first_name' => 'tester',
                    'last_name' => 'system',
                    'sex' => 'male',
                    'email' => 'tester1@codingduluaja.com',
                    'password' => bcrypt('Admin#2024')
                ],
                [   'username' => 'ops1',
                    'role_code' => UserRole::ops()->getCode(),
                    'first_name' => 'operation',
                    'last_name' => 'system',
                    'sex' => 'male',
                    'email' => 'ops1@codingduluaja.com',
                    'password' => bcrypt('Admin#2024')
                ]
            ]
        );
    }

    public function down(): void
    {
        DB::table(TableName::USERS)
            ->whereIn('username', 
                ['admin1', 'adminsu', 'tester1', 'ops1', 'user1']
            )->delete();
    }
};
