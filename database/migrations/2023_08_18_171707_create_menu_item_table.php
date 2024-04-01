<?php

use App\Constants\TableName;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(TableName::MENU_ITEM, function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('menu_parent_id');
            $table->string('name', 50);
            $table->string('page', 30);
            $table->integer('sequence');
            $table->timestamps();

            $table->index('sequence');
            $table->unique(['menu_parent_id', 'sequence']);
            $table->foreign('menu_parent_id')->references('id')->on(TableName::MENU_PARENT);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(TableName::MENU_ITEM);
    }
};
