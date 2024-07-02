<?php

use App\Constants\TableName;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(TableName::USER_API, function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('user_id');
            $table->string('name');
            $table->string('nik')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on(TableName::USERS);
        });

        Schema::create(TableName::ADDRESS_USER_API, function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('user_api_id');
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('postcode')->nullable();
            $table->string('detail')->nullable();
            $table->timestamps();

            $table->foreign('user_api_id')->references('id')->on(TableName::USER_API);
        });

        Schema::create(TableName::IMAGE_USER_API, function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('user_api_id');
            $table->string('path');
            $table->string('filename');
            $table->timestamps();

            $table->foreign('user_api_id')->references('id')->on(TableName::USER_API);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(TableName::USER_API);
    }
};
