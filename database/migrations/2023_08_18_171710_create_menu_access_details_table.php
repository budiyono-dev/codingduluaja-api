<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Constants\TableName;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(TableName::MENU_ACCESS_DETAIL, function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('menu_access_id');
            $table->unsignedBiginteger('menu_item_id');
            $table->boolean('enabled')->default(false);
            $table->timestamps();

            $table->foreign('menu_access_id')->references('id')->on(TableName::MENU_ACCESS);
        });

        Schema::table(TableName::MENU_ACCESS_DETAIL, function (Blueprint $table) {
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->change();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'))->change();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(TableName::MENU_ACCESS_DETAIL);
    }
};
