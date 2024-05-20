<?php

use App\Constants\TableName;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Constants\UserRole;

return new class extends Migration
{
    public function up(): void
    {
        DB::table(TableName::USER_ROLE)->insert([

            [
                'code' => UserRole::admin()->getCode(),
                'name' => UserRole::admin()->getName()
            ],
            [
                'code' => UserRole::superUser()->getCode(),
                'name' => UserRole::superUser()->getName()
            ],
            [
                'code' => UserRole::ops()->getCode(),
                'name' => UserRole::ops()->getName()
            ],
            [
                'code' => UserRole::user()->getCode(),
                'name' => UserRole::user()->getName()
            ]
        ]);
    }

    public function down(): void
    {
        DB::table(TableName::USER_ROLE)->where('code', 'ADMIN')->delete();
    }
};
