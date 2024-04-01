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
        Schema::create(TableName::USERS, function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('role_code');
            $table->string('first_name', 50);
            $table->string('last_name', 50)->nullable()->default(null);
            $table->string('sex')->nullable();
            $table->string('email', 50)->unique();
            $table->string('password', 100);
            $table->timestamps();

            $table->index('username');
            $table->index('email');

            $table->foreign('role_code')->references('code')->on(TableName::USER_ROLE);
        });

        Schema::table(TableName::USERS, function (Blueprint $table) {
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->change();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'))->change();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(TableName::USERS);
    }
};
