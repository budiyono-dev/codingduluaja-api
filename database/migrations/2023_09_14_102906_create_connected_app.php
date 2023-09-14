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
            $table->unsignedBigInteger('app_client_id');
            $table->timestamps();

            $table->foreign('client_resource_id')->references('id')->on(TableNameConstant::CLIENT_RESOURCE);
            $table->foreign('app_client_id')->references('id')->on(TableNameConstant::APP_CLIENT);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(TableNameConstant::CONNECTED_APP);
    }
};
