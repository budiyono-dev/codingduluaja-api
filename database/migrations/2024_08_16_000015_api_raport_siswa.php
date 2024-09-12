<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('r_siswa', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nis');
            $table->string('nisn');
            $table->timestamps();
        });

        Schema::create('r_guru', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nip');
            $table->timestamps();
        });

        Schema::create('r_mapel', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('deskripsi');
            $table->timestamps();
        });

        Schema::create('r_pengampuh', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_guru');
            $table->unsignedBigInteger('id_mapel');
            $table->integer('semester');
            $table->string('tahun_pelajaran');
            $table->timestamps();
        });

        Schema::create('r_kelas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('deskripsi');
            $table->timestamps();
        });

        Schema::create('r_kelas_siswa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_siswa');
            $table->unsignedBigInteger('id_kelas');
            $table->integer('semester');
            $table->string('tahun_pelajaran');
            $table->timestamps();
        });

        Schema::create('r_nilai_uts', function (Blueprint $table) {
            $table->id();
            $table->string('mapel');
            $table->integer('nilai');
            $table->integer('semester');
            $table->string('tahun_pelajaran');
            $table->timestamps();
        });

        Schema::create('r_nilai_uas', function (Blueprint $table) {
            $table->id();
            $table->string('mapel');
            $table->string('deskripsi');
            $table->integer('nilai');
            $table->integer('semester');
            $table->string('tahun_pelajaran');
            $table->timestamps();
        });

        Schema::create('r_nilai_tugas', function (Blueprint $table) {
            $table->id();
            $table->string('mapel');
            $table->string('deskripsi');
            $table->string('nilai');
            $table->integer('semester');
            $table->string('tahun_pelajaran');
            $table->timestamps();
        });

        Schema::create('r_nilai_praktikum', function (Blueprint $table) {
            $table->id();
            $table->string('mapel');
            $table->string('deskripsi');
            $table->integer('nilai');
            $table->integer('semester');
            $table->string('tahun_pelajaran');
            $table->timestamps();
        });

        Schema::create('r_ulangan', function (Blueprint $table) {
            $table->id();
            $table->string('mapel');
            $table->string('deskripsi');
            $table->integer('nilai');
            $table->integer('semester');
            $table->string('tahun_pelajaran');
            $table->timestamps();
        });

        Schema::create('r_raport_report', function (Blueprint $table) {
            $table->id();
            $table->string('mapel');
            $table->integer('nilai');
            $table->integer('semester');
            $table->boolean('is_remidial');
            $table->string('tahun_pelajaran');
            $table->timestamps();
        });

        Schema::create('r_nilai_remidial', function (Blueprint $table) {
            $table->id();
            $table->string('mapel');
            $table->integer('nilai');
            $table->integer('semester');
            $table->string('tahun_pelajaran');
            $table->timestamps();
        });

        Schema::create('r_kkm', function (Blueprint $table) {
            $table->id();
            $table->string('mapel');
            $table->integer('kkm');
            $table->integer('semester');
            $table->string('tahun_pelajaran');
            $table->timestamps();
        });

        Schema::create('r_perhitungan_akhir', function (Blueprint $table) {
            $table->id();
            $table->integer('persentase_tugas');
            $table->integer('jumlah_tugas');
            $table->integer('persentase_ulangan');
            $table->integer('jumlah_ulangan');
            $table->integer('persentase_paktikum');
            $table->integer('jumlah_praktikum');
            $table->integer('persentase_uas');
            $table->integer('persentase_uts');
            $table->integer('semester');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('r_perhitungan_akhir');
        Schema::dropIfExists('r_kkm');
        Schema::dropIfExists('r_nilai_remidial');
        Schema::dropIfExists('r_raport_report');
        Schema::dropIfExists('r_ulangan');
        Schema::dropIfExists('r_nilai_praktikum');
        Schema::dropIfExists('r_nilai_tugas');
        Schema::dropIfExists('r_nilai_uas');
        Schema::dropIfExists('r_nilai_uts');
        Schema::dropIfExists('r_kelas_siswa');
        Schema::dropIfExists('r_kelas');
        Schema::dropIfExists('r_pengampuh');
        Schema::dropIfExists('r_mapel');
        Schema::dropIfExists('r_guru');
        Schema::dropIfExists('r_siswa');
    }
};
