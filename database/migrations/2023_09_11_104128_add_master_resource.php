<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\MasterResource;

return new class extends Migration
{
    public function up(): void
    {
        MasterResource::create([
            'name'=>'Todolist',
            'path' => '/todolist'
        ]);

    }

    public function down(): void
    {
        MasterResource::find('name', 'Todolist')->first()->delete();
    }
};
