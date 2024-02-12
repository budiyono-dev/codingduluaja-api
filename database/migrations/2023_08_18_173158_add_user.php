<?php

use App\Constants\TableName;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table(TableName::USERS)->insert([
            'username' => 'testerCda',
            'first_name' => 'tester',
            'last_name' => 'Codingduluaja',
            'sex' => 'male',
            'email' => 'tester@codingduluaja.online',
            'password' => bcrypt('123456')
        ]);
    }

    public function down(): void
    {
        DB::table(TableName::USERS)->where('username', 'testerCda')->delete();
    }
};
