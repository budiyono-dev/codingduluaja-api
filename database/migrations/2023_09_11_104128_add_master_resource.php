<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\MasterResource;
use App\Constants\ApiPath;

return new class extends Migration
{
    public function up(): void
    {
        MasterResource::create([
            'name' => 'Todolist',
            'path' => ApiPath::TODOLIST
        ]);
        MasterResource::create([
            'name' => 'Wilayah BPS',
            'path' => ApiPath::WILAYAH_BPS
        ]);
        MasterResource::create([
            'name' => 'Wilayah DAGRI',
            'path' => ApiPath::WILAYAH_DAGRI
        ]);
    }

    public function down(): void
    {
        MasterResource::find('name', 'Todolist')->first()->delete();
        MasterResource::find('name', 'Wilayah BPS')->first()->delete();
        MasterResource::find('name', 'Wilayah DAGRI')->first()->delete();
    }
};
