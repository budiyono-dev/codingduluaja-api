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
            'name'=>'Todolist',
            'path' => ApiPath::TODOLIST
        ]);

    }

    public function down(): void
    {
        MasterResource::find('name', 'Todolist')->first()->delete();
    }
};
