<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Constants\TableName;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(TableName::MENU_ACCESS, function (Blueprint $table) {
            $table->id();
            $table->string('name', 20);
            $table->string('description', 100);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(TableName::MENU_ACCESS);
    }
};
