<?php

use App\Constants\TableName;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(TableName::TOKEN, function (Blueprint $table) {
            $table->id();
            $table->string('token', 100);
			$table->string('identifier', 100);
            $table->unsignedBigInteger('exp');
            $table->timestamps();

            $table->index('token');
            $table->index('identifier');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(TableName::TOKEN);
    }
};
