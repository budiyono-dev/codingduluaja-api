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

        Schema::create(TableName::KABUPATEN, function (Blueprint $table) {
            $table->id();//(id, provinsi_id, kode_bps, nama_bps, kode_dagri, nama_dagri)
            $table->unsignedBigInteger('provinsi_id');
            $table->string('kode_bps', 100);
            $table->string('nama_bps', 100);
            $table->string('kode_dagri', 100);
            $table->string('nama_dagri', 100);
            $table->timestamps();

            $table->foreign('provinsi_id')->references('id')->on(TableName::PROVINSI);
            $table->index('kode_bps');
            $table->index('kode_dagri');
        });

        Schema::create(TableName::KECAMATAN, function (Blueprint $table) {
            $table->id();//(id, provinsi_id, kabupaten_id, kode_bps, nama_bps, kode_dagri, nama_dagri)
            $table->unsignedBigInteger('provinsi_id');
            $table->unsignedBigInteger('kabupaten_id');
            $table->string('kode_bps', 100);
            $table->string('nama_bps', 100);
            $table->string('kode_dagri', 100);
            $table->string('nama_dagri', 100);
            $table->timestamps();

            $table->foreign('provinsi_id')->references('id')->on(TableName::PROVINSI);
            $table->foreign('kabupaten_id')->references('id')->on(TableName::KABUPATEN);
            $table->index('kode_bps');
            $table->index('kode_dagri');
        });

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
    }

    public function down(): void
    {
        Schema::dropIfExists(TableName::PROVINSI);
    }
};
