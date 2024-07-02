<?php

use App\Constants\ExpUnit;
use App\Models\ExpiredToken;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        $exp1Day = new ExpiredToken(
            [
                'exp_value' => 1,
                'unit' => ExpUnit::DAY,
            ]
        );

        $exp1Day->save();

        $exp3Day = new ExpiredToken(
            [
                'exp_value' => 3,
                'unit' => ExpUnit::DAY,
            ]
        );
        $exp3Day->save();

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
