<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('menu_parent', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->integer('sequence')->unique();
            $table->timestamps();
            
            $table->index('sequence');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menu_parent');
    }
};