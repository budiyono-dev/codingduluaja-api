<?php

use App\Constants\TableName;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(TableName::USER_ROLE, function (Blueprint $table) {
            $table->string('code', 20)->primary();
            $table->string('name', 20);
            $table->timestamps();
        });
        
        Schema::create(TableName::USERS, function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role', 20);
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('role')->references('code')->on(TableName::USER_ROLE);
        });

        Schema::create(TableName::PASSWORD_RESET_TOKENS, function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create(TableName::SESSIONS, function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(TableName::USER_ROLE);
        Schema::dropIfExists(TableName::USERS);
        Schema::dropIfExists(TableName::PASSWORD_RESET_TOKENS);
        Schema::dropIfExists(TableName::SESSIONS);
    }
};
