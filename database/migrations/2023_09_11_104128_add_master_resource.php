<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\MasterResource;

return new class extends Migration
{
    public function up(): void
    {
        $todolistReource = new MasterResource();
        $todolistReource->name = 'Todolist';
        $todolistReource->save();

    }

    public function down(): void
    {
        $todolist = MasterResource::find('name', 'Todolist')->first();
        $todolist->delete();
    }
};
