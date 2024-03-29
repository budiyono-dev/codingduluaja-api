<?php

use App\Constants\TableName;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        DB::table(TableName::USER_ROLE)->insert([
            'code' => 'ADMIN',
            'name' => 'admin'
        ]);
    }

    public function down(): void
    {
        DB::table(TableName::USER_ROLE)->where('code', 'ADMIN')->delete();
    }
};
