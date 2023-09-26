<?php

use App\Constants\TableNameConstant;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(TableNameConstant::CLIENT_APP, function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('user_id');
            $table->string('name', 50);
            $table->string('app_key', 32);
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on(TableNameConstant::USERS);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(TableNameConstant::CLIENT_APP);
    }
};
