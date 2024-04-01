<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('menu_access_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('menu_access_id');
            $table->unsignedBiginteger('menu_item_id');
            $table->boolean('enabled')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menu_access_details');
    }
};
