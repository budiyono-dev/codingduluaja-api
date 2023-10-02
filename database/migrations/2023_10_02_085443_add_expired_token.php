<?php

use App\Enums\ExpUnit;
use App\Models\ExpiredToken;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
                'exp_value' => 1,
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
