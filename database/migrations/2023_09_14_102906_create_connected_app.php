<?php

use App\Constants\TableName;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(TableName::CONNECTED_APP, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_resource_id');
            $table->unsignedBigInteger('client_app_id');
            $table->timestamps();

            $table->foreign('client_resource_id')->references('id')->on(TableName::CLIENT_RESOURCE);
            $table->foreign('client_app_id')->references('id')->on(TableName::CLIENT_APP);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(TableName::CONNECTED_APP);
    }
};
