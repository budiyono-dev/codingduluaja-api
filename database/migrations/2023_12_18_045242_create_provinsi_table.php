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
        Schema::create(TableName::PROVINSI, function (Blueprint $table) {
            $table->id();//id, kode_bps, nama_bps, kode_dagri, nama_dagri
            $table->string('kode_bps', 100);
            $table->string('nama_bps', 100);
            $table->string('kode_dagri', 100);
            $table->string('nama_dagri', 100);
            $table->timestamps();
        });
        Schema::table(TableName::PROVINSI, function (Blueprint $table) {
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->change();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'))->change();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(TableName::PROVINSI);
    }
};
