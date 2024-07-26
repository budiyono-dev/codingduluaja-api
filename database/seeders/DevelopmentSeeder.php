<?php

namespace Database\Seeders;

use App\Models\ClientApp;
use App\Models\ClientResource;
use App\Models\MasterResource;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class DevelopmentSeeder extends Seeder
{
    public function run(): void
    {
        $userId = 2;
        $now = Carbon::now();
        Log::info('[DEPLOYMENT-SEEDER] Seeding Development Seeder');
        $listClientApp = $this->getListClientApp($userId, $now);
        Log::info('[DEPLOYMENT-SEEDER] Insert Client App');
        ClientApp::insert($listClientApp);

        Log::info('[DEPLOYMENT-SEEDER] Insert Client Resource');
        $listClientRes = $this->getListClientResource($userId, $now);
        ClientResource::insert($listClientRes);
    }

    private function genKey(): string
    {
        return Str::replace('-', '', Str::uuid());
    }

    private function getListClientApp(int $userId, $now): array
    {
        return [
            [
                'user_id' => $userId,
                'name' => 'testing',
                'description' => 'testing',
                'app_key' => $this->genKey(),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => $userId,
                'name' => 'kopi shop',
                'description' => 'testing',
                'app_key' => $this->genKey(),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => $userId,
                'name' => 'kebun',
                'description' => 'testing',
                'app_key' => $this->genKey(),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => $userId,
                'name' => 'react web app',
                'description' => 'testing',
                'app_key' => $this->genKey(),
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];
    }

    private function getListClientResource(int $userId, $now): array
    {
        $listClientRes = [];
        $listMRes = MasterResource::all('id');
        foreach ($listMRes as $mr) {
            $listClientRes[] = [
                'user_id' => $userId,
                'master_resource_id' => $mr['id'],
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        return $listClientRes;
    }
}
