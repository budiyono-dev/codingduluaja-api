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
            $table->string('username');
            $table->string('nik');
            $table->string('phone');
            $table->string('email');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on(TableName::USERS);
        });

        Schema::table(TableName::USER_API, function (Blueprint $table) {
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->change();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'))->change();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(TableName::USER_API);
    }
};
