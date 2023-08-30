<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('menu_item', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('menu_parent_id');
            $table->string('name', 50);
            $table->string('page', 30);
            $table->integer('sequence');
            $table->timestamps();
            
            $table->index('sequence');
            $table->unique(['menu_parent_id', 'sequence']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menu_item');
    }
};
