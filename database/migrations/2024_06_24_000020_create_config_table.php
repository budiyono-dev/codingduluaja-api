<?php

use App\Constants\TableName;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(TableName::CONFIGURATION, function (Blueprint $table) {
            $table->string('key')->primary();
            $table->string('group');
            $table->string('value');
            $table->timestamps();

            $table->unique(['group', 'key']);
        });

        Schema::table(TableName::MENU_ACCESS, function (Blueprint $table) {
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->change();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'))->change();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(TableName::CONFIGURATION);
    }
};
