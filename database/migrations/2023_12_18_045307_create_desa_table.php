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
        Schema::create(TableName::DESA, function (Blueprint $table) {
            $table->id();//(id, provinsi_id, kabupaten_id, kecamatan_id, kode_bps, nama_bps, kode_dagri, nama_dagri) 
            $table->unsignedBigInteger('provinsi_id');
            $table->unsignedBigInteger('kabupaten_id');
            $table->unsignedBigInteger('kecamatan_id');
            $table->string('kode_bps', 100);
            $table->string('nama_bps', 100);
            $table->string('kode_dagri', 100);
            $table->string('nama_dagri', 100);
            $table->timestamps();

            $table->foreign('provinsi_id')->references('id')->on(TableName::PROVINSI);
            $table->foreign('kabupaten_id')->references('id')->on(TableName::KABUPATEN);
            $table->foreign('kecamatan_id')->references('id')->on(TableName::KECAMATAN);
            $table->index('kode_bps');
            $table->index('kode_dagri');
        });
        Schema::table(TableName::DESA, function (Blueprint $table) {
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->change();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'))->change();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists(TableName::DESA);
    }
};
