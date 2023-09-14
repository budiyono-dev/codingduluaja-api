<?php

use App\Constants\TableNameConstant;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create(TableNameConstant::USERS, function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('first_name', 50);
            $table->string('last_name', 50)->nullable()->default(null);
            $table->string('sex')->nullable();
            $table->string('email', 50)->unique();
            $table->string('password', 100);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->index('username');
            $table->index('email');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(TableNameConstant::USERS);
    }
};
