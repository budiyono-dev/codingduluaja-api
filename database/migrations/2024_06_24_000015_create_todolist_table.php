<?php

use App\Constants\TableName;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(TableName::TODOLIST, function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('user_id');
            $table->date('date');
            $table->string('name', 50);
            $table->string('description', 1000);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on(TableName::USERS);
            $table->index(['id', 'user_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(TableName::TODOLIST);
    }
};
