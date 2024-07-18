<?php

use App\Constants\ApiPath;
use App\Models\MasterResource;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        MasterResource::create([
            'name' => 'Todolist',
            'path' => ApiPath::TODOLIST,
        ]);
        MasterResource::create([
            'name' => 'Wilayah BPS',
            'path' => ApiPath::WILAYAH_BPS,
        ]);
        MasterResource::create([
            'name' => 'Wilayah DAGRI',
            'path' => ApiPath::WILAYAH_DAGRI,
        ]);
        MasterResource::create([
            'name' => 'User Api',
            'path' => ApiPath::USER_API,
        ]);
    }

    public function down(): void
    {
        MasterResource::find('name', 'Todolist')->first()->delete();
        MasterResource::find('name', 'Wilayah BPS')->first()->delete();
        MasterResource::find('name', 'Wilayah DAGRI')->first()->delete();
        MasterResource::find('name', 'User Api')->first()->delete();
    }
};
