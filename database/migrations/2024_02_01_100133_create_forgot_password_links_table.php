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
        Schema::create(TableName::FORGOT_PASSWORD_TOKEN, function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('token');
            $table->date('date');
            $table->boolean('is_valid')->default(true);
            $table->timestamps();

            $table->index('created_at');
        });

        Schema::table(TableName::FORGOT_PASSWORD_TOKEN, function (Blueprint $table) {
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->change();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'))->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(TableName::FORGOT_PASSWORD_LINK);
    }
};
