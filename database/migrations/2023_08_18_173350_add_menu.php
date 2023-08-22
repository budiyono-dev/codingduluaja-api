<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{

    public function up(): void
    {
        DB::table('menu_parent')->insert(
            [
                'name' => 'App Resource',
                'page' => '/home'
            ],
            [
                'name' => 'App Resource',
                'page' => '/home'
            ]
        );
    }

    public function down(): void
    {
        DB::table('users')->where('username', 'adminTest')->delete();
    }
};
