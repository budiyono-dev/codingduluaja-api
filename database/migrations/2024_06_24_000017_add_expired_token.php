<?php

use App\Constants\ExpUnit;
use App\Models\ExpiredToken;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        ExpiredToken::create(['exp_value' => 1, 'unit' => ExpUnit::DAY]);
        ExpiredToken::create(['exp_value' => 3, 'unit' => ExpUnit::DAY]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
