<?php

use App\Constants\TableName;
use Illuminate\Database\Migrations\Migration;
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

            $table->foreign('user_id')->references('id')->on(TableName::USERS);
        });

        Schema::create(TableName::REPORT_IMAGE, function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('report_id');
            $table->string('image');
            $table->timestamps();
            $table->foreign('report_id')->references('id')->on(TableName::REPORT);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(TableName::REPORT);
        Schema::dropIfExists(TableName::REPORT_IMAGE);
    }
};
