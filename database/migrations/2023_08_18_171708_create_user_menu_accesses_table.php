<?php

use App\Constants\TableName;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_menu_accesses', function (Blueprint $table) {
            $table->id();
            $table->string('role_code');
            $table->unsignedBigInteger('menu_access_id');
            $table->timestamps();

            $table->foreign('role_code')->references('id')->on(TableName::USER_ROLE);
            $table->foreign('menu_access_id')->references('id')->on(TableName::CLIENT_APP);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_menu_accesses');
    }
};
