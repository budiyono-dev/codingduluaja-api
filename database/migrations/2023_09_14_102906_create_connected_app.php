<?php

use App\Constants\TableNameConstant;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(TableNameConstant::CONNECTED_APP, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_resource_id');
            $table->unsignedBigInteger('client_app_id');
            $table->timestamps();

            $table->foreign('client_resource_id')->references('id')->on(TableNameConstant::CLIENT_RESOURCE);
            $table->foreign('client_app_id')->references('id')->on(TableNameConstant::CLIENT_APP);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(TableNameConstant::CONNECTED_APP);
    }
};
