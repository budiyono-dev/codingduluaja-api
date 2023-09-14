<?php

use App\Constants\TableNameConstant;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(TableNameConstant::CLIENT_RESOURCE, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('master_resource_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on(TableNameConstant::USERS);
            $table->foreign('master_resource_id')->references('id')->on(TableNameConstant::MASTER_RESOURCE);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(TableNameConstant::CLIENT_RESOURCE);
    }
};
