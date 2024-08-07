<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AllWilayahSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            ProvinsiSeeder::class,
            KabupatenSeeder::class,
            KecamatanSeeder::class,
            DesaSeeder::class,
        ]);
    }
}
