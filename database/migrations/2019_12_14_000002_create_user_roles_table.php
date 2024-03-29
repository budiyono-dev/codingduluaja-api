<?php

use App\Constants\TableName;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(TableName::USER_ROLE, function (Blueprint $table) {
            $table->id();
            $table->string('code', 20)->unique();
            $table->string('name', 20);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(TableName::USER_ROLE);
    }
};
