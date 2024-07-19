<?php

namespace App\Helper;

use Illuminate\Support\Facades\Artisan;

class ArtisanHelper
{
    public function __construct(
        protected array $force = ['--force' => true],
    ) {}

    public function migrateFresh(): string
    {
        Artisan::call('migrate:fresh', $this->force);

        return Artisan::output();
    }

    public function migrate(): string
    {
        Artisan::call('migrate', $this->force);

        return Artisan::output();
    }

    public function rolback(): string
    {
        Artisan::call('migrate:rollback', $this->force);

        return Artisan::output();
    }

    public function migrateStatus(): string
    {
        Artisan::call('migrate:status');

        return Artisan::output();
    }

    public function seedingClass(string $class): string
    {
        Artisan::call('db:seed', array_merge($this->force, ['--class' => $class]));

        return Artisan::output();
    }

    public function down(string $secret): string
    {
        Artisan::call('down', ['--secret' => $secret]);

        return Artisan::output();
    }

    public function up(): string
    {
        Artisan::call('up');

        return Artisan::output();
    }
}
