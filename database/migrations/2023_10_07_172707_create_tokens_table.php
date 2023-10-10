<?php

use App\Constants\TableNameConstant;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(TableNameConstant::TOKEN, function (Blueprint $table) {
            $table->id();
            $table->string('token');
			$table->string('identifier');
            $table->unsignedBigInteger('exp');
            $table->boolean('is_revoked')->default(0);
            $table->timestamps();

            $table->index('token');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(TableNameConstant::TOKEN);
    }
};
