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
        Schema::create(TableName::CLIENT_RESOURCE, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('master_resource_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on(TableName::USERS);
            $table->foreign('master_resource_id')->references('id')->on(TableName::MASTER_RESOURCE);
            $table->unique(['user_id', 'master_resource_id']);
        });
        Schema::table(TableName::CLIENT_RESOURCE, function (Blueprint $table) {
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->change();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'))->change();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(TableName::CLIENT_RESOURCE);
    }
};
