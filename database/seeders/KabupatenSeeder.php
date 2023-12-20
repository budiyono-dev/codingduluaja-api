<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class KabupatenSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function(){
            $sql = Storage::disk('local')->get('sql/kabupaten.sql');
            DB::unprepared($sql);
        });
    }
}
