<?php

use App\Constants\TableName;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(TableName::CLIENT_APP, function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('user_id');
            $table->string('name', 50);
            $table->string('app_key', 32);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on(TableName::USERS);
        });

        Schema::create(TableName::MASTER_RESOURCE, function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->unique();
            $table->string('path', 50)->unique();
            $table->timestamps();
        });

        Schema::create(TableName::CLIENT_RESOURCE, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('master_resource_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on(TableName::USERS);
            $table->foreign('master_resource_id')->references('id')->on(TableName::MASTER_RESOURCE);
            $table->unique(['user_id', 'master_resource_id']);
        });

        Schema::create(TableName::CONNECTED_APP, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_resource_id');
            $table->unsignedBigInteger('client_app_id');
            $table->timestamps();

            $table->foreign('client_resource_id')->references('id')->on(TableName::CLIENT_RESOURCE);
            $table->foreign('client_app_id')->references('id')->on(TableName::CLIENT_APP);
        });

        Schema::create(TableName::EXPIRED_TOKEN, function (Blueprint $table) {
            $table->id();
            $table->integer('exp_value');
            $table->string('unit', 20);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(TableName::CLIENT_APP);
        Schema::dropIfExists(TableName::MASTER_RESOURCE);
        Schema::dropIfExists(TableName::CLIENT_RESOURCE);
        Schema::dropIfExists(TableName::CONNECTED_APP);
        Schema::dropIfExists(TableName::EXPIRED_TOKEN);
    }
};
