<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('expired_app_token', function (Blueprint $table) {
            $table->id();
            $table->integer('exp_value');
            $table->string('unit', 20);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('expired_app_token');
    }
};
