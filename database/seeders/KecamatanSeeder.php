<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class KecamatanSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {
            $sql = Storage::disk('local')->get('sql/kecamatan.sql');
            DB::unprepared($sql);
        });
    }
}
