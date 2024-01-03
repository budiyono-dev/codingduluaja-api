<?php

namespace Database\Seeders;

use App\Models\ClientApp;
use App\Models\ClientResource;
use App\Models\MasterResource;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class DevelopmentSeeder extends Seeder
{

    public function run(): void
    {
        Log::info('Seeding Development Seeder');
        $listClientApp = $this->getListClientApp();
        Log::info('Insert Client App');
        ClientApp::insert($listClientApp);

        Log::info('Insert Client Resource');
        $listClientRes = $this->getListClientResource();
        ClientResource::insert($listClientRes);

    }

    private function genKey(): string
    {
        return Str::replace('-', '', Str::uuid());
    }
    private function getListClientApp(): array
    {
        return [
            [
                'user_id' => 1,
                'name' => 'testing',
                'app_key' => $this->genKey()
            ],
            [
                'user_id' => 1,
                'name' => 'kopi shop',
                'app_key' => $this->genKey()
            ],
            [
                'user_id' => 1,
                'name' => 'kebun',
                'app_key' => $this->genKey()
            ],
            [
                'user_id' => 1,
                'name' => 'react web app',
                'app_key' => $this->genKey()
            ]
        ];
    }
    private function getListClientResource() : array
     {
        $listClientRes = [];
        $listMRes = MasterResource::all('id');
        foreach ($listMRes as $mr) {
            $listClientRes[] = [
                'user_id' => 1, 
                'master_resource_id' => $mr['id']
            ];
        }
        return $listClientRes;
    }
}
