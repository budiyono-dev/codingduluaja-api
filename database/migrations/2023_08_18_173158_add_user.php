<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('users')->insert([
            'username' => 'adminTest',
            'first_name' => 'admin',
            'last_name' => 'test',
            'sex' => 'male',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456')
        ]);
    }

    public function down(): void
    {
        DB::table('users')->where('username', 'adminTest')->delete();
    }
};
