<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DesaSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {
            $sql = Storage::disk('local')->get('sql/desa.sql');
            DB::unprepared($sql);
        });
    }
}
