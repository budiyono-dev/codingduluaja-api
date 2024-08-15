<?php

use App\Helper\MigrationUtils;
use Illuminate\Database\Migrations\Migration;
use App\Constants\TableName;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(TableName::REPORT, function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('user_id');
            $table->string('category');
            $table->string('title');
            $table->longText('payload');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(TableName::REPORT);
    }
};
