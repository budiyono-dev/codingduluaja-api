<?php

namespace Tests\Feature\Api;

use App\Services\Application\AppClientService;
use App\Services\Application\AppClientServiceImpl;
use App\Services\Application\AppManagerService;
use App\Services\Application\AppManagerServiceImpl;
use App\Services\Application\AppResourceService;
use App\Services\Application\AppResourceServiceImpl;
use Database\Seeders\AllWilayahSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class WilayahTest extends TestCase
{
    use RefreshDatabase;

    protected string $tokenWilayah = '';

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(AllWilayahSeeder::class);
        $userId = 2;
        $this->app->singleton(AppClientService::class, AppClientServiceImpl::class);
        $this->app->singleton(AppResourceService::class, AppResourceServiceImpl::class);
        $this->app->singleton(AppManagerService::class, AppManagerServiceImpl::class);

        $appClientService = $this->app->make(AppClientService::class);
        $appResourceService = $this->app->make(AppResourceService::class);
        $appManagerService = $this->app->make(AppManagerService::class);

        $appClient = $appClientService->createAppClient(2, 'testing client', 'testing client desc');
        $appResource = $appResourceService->addResource($userId, 2);
        $token = $appManagerService->createToken($userId, $appResource->id, $appClient->id, 1);

        $this->tokenWilayah = $token;
    }

    public function testListProvinsiBps(): void
    {
        $response = $this->withHeaders([
            'Authorization' => $this->tokenWilayah,
        ])->get('/api/wilayah/bps/provinsi');

        $response->assertOk();
        $response->assertJson(fn (AssertableJson $json) => $json->has('meta')
            ->has('data')
            ->has('data.0', fn (AssertableJson $json) => $json->where('nama', 'ACEH')->where('id', 1)
            )
        );
    }

    public function testDetailProvinsiBps(): void
    {
        $response = $this->withHeaders([
            'Authorization' => $this->tokenWilayah,
        ])->get('/api/wilayah/bps/provinsi/1');

        $response->assertOk();
        $response->assertJson(fn (AssertableJson $json) => $json->has('meta')
            ->has('data', fn (AssertableJson $json) => $json->where('nama', 'ACEH')->etc())
        );
    }

    public function testListKabupatenBps(): void
    {
        $response = $this->withHeaders([
            'Authorization' => $this->tokenWilayah,
        ])->get('/api/wilayah/bps/kabupaten?provinsi_id=13');

        $response->assertOk();
        $response->assertJson(fn (AssertableJson $json) => $json->has('meta')
            ->has('data')
            ->has('data.0', fn (AssertableJson $json) => $json->where('nama', 'CILACAP')->etc()
            )
        );
    }

    public function testDetailKabupatenBps(): void
    {
        $response = $this->withHeaders([
            'Authorization' => $this->tokenWilayah,
        ])->get('/api/wilayah/bps/kabupaten/222');

        $response->assertOk();
        $response->assertJson(fn (AssertableJson $json) => $json->has('meta')
            ->has('data', fn (AssertableJson $json) => $json->where('nama', 'TEGAL')->etc()
            )
        );
    }

    public function testListKecamatanBps(): void
    {
        $response = $this->withHeaders([
            'Authorization' => $this->tokenWilayah,
        ])->get('/api/wilayah/bps/kecamatan?kabupaten_id=188');

        $response->assertOk();
        $response->assertJson(fn (AssertableJson $json) => $json->has('meta')
            ->has('data')
            ->has('data.18', fn (AssertableJson $json) => $json->where('nama', 'KROYA')->etc()
            )
        );
    }

    public function testDetailKecamatanBps(): void
    {
        $response = $this->withHeaders([
            'Authorization' => $this->tokenWilayah,
        ])->get('/api/wilayah/bps/kecamatan/2636');

        $response->assertOk();
        $response->assertJson(fn (AssertableJson $json) => $json->has('meta')
            ->has('data', fn (AssertableJson $json) => $json->where('nama', 'KROYA')->etc()
            )
        );
    }

    public function testListDesaBps(): void
    {
        $response = $this->withHeaders([
            'Authorization' => $this->tokenWilayah,
        ])->get('/api/wilayah/bps/desa?kecamatan_id=1854');

        $response->assertOk();
        $response->assertJson(fn (AssertableJson $json) => $json->has('meta')
            ->has('data')
            ->has('data.1', fn (AssertableJson $json) => $json->where('nama', 'PASIR PUTIH')->etc()
            )
        );
    }

    public function testDetailDesaBps(): void
    {
        $response = $this->withHeaders([
            'Authorization' => $this->tokenWilayah,
        ])->get('/api/wilayah/bps/desa/24683');

        $response->assertOk();
        $response->assertJson(fn (AssertableJson $json) => $json->has('meta')
            ->has('data', fn (AssertableJson $json) => $json->where('nama', 'PASIR PUTIH')->etc()
            )
        );
    }

    public function testListProvinsiDagri(): void
    {
        $response = $this->withHeaders([
            'Authorization' => $this->tokenWilayah,
        ])->get('/api/wilayah/dagri/provinsi');

        $response->assertOk();
        $response->assertJson(fn (AssertableJson $json) => $json->has('meta')
            ->has('data')
            ->has('data.0', fn (AssertableJson $json) => $json->where('nama', 'ACEH')->where('id', 1)
            )
        );
    }

    public function testDetailProvinsiDagri(): void
    {
        $response = $this->withHeaders([
            'Authorization' => $this->tokenWilayah,
        ])->get('/api/wilayah/dagri/provinsi/1');

        $response->assertOk();
        $response->assertJson(fn (AssertableJson $json) => $json->has('meta')
            ->has('data', fn (AssertableJson $json) => $json->where('nama', 'ACEH')->etc())
        );
    }

    public function testListKabupatenDagri(): void
    {
        $response = $this->withHeaders([
            'Authorization' => $this->tokenWilayah,
        ])->get('/api/wilayah/dagri/kabupaten?provinsi_id=13');

        $response->assertOk();
        $response->assertJson(fn (AssertableJson $json) => $json->has('meta')
            ->has('data')
            ->has('data.0', fn (AssertableJson $json) => $json->where('nama', 'KAB. CILACAP')->etc()
            )
        );
    }

    public function testDetailKabupatenDagri(): void
    {
        $response = $this->withHeaders([
            'Authorization' => $this->tokenWilayah,
        ])->get('/api/wilayah/dagri/kabupaten/222');

        $response->assertOk();
        $response->assertJson(fn (AssertableJson $json) => $json->has('meta')
            ->has('data', fn (AssertableJson $json) => $json->where('nama', 'KOTA TEGAL')->etc()
            )
        );
    }

    public function testListKecamatanDagri(): void
    {
        $response = $this->withHeaders([
            'Authorization' => $this->tokenWilayah,
        ])->get('/api/wilayah/dagri/kecamatan?kabupaten_id=188');

        $response->assertOk();
        $response->assertJson(fn (AssertableJson $json) => $json->has('meta')
            ->has('data')
            ->has('data.18', fn (AssertableJson $json) => $json->where('nama', 'KROYA')->etc()
            )
        );
    }

    public function testDetailKecamatanDagri(): void
    {
        $response = $this->withHeaders([
            'Authorization' => $this->tokenWilayah,
        ])->get('/api/wilayah/dagri/kecamatan/2636');

        $response->assertOk();
        $response->assertJson(fn (AssertableJson $json) => $json->has('meta')
            ->has('data', fn (AssertableJson $json) => $json->where('nama', 'KROYA')->etc()
            )
        );
    }

    public function testListDesaDagri(): void
    {
        $response = $this->withHeaders([
            'Authorization' => $this->tokenWilayah,
        ])->get('/api/wilayah/dagri/desa?kecamatan_id=1854');

        $response->assertOk();
        $response->assertJson(fn (AssertableJson $json) => $json->has('meta')
            ->has('data')
            ->has('data.1', fn (AssertableJson $json) => $json->where('nama', 'PASIR PUTIH')->etc()
            )
        );
    }

    public function testDetailDesaDagri(): void
    {
        $response = $this->withHeaders([
            'Authorization' => $this->tokenWilayah,
        ])->get('/api/wilayah/dagri/desa/24683');

        $response->assertOk();
        $response->assertJson(fn (AssertableJson $json) => $json->has('meta')
            ->has('data', fn (AssertableJson $json) => $json->where('nama', 'PASIR PUTIH')->etc()
            )
        );
    }
}
