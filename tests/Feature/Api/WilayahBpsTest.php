<?php

namespace Tests\Feature\Api;

use Database\Seeders\AllWilayahSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class WilayahBpsTest extends TestCase
{
    use RefreshDatabase;

    protected string $tokenWilayah = '';

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(AllWilayahSeeder::class);
        $this->tokenWilayah = $this->createResourceToken(2);
    }

    public function testListProvinsiBps(): void
    {
        $response = $this->withHeaders([
            'Authorization' => $this->tokenWilayah,
        ])->get('/api/wilayah/bps/provinsi');

        $response->assertOk();
        $response->assertJson(fn (AssertableJson $json) => $json->has('meta')
            ->has('data')
            ->has('data.0', fn (AssertableJson $json) => $json->where('nama', 'ACEH')->where('id', 1))
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
            ->has('data.0', fn (AssertableJson $json) => $json->where('nama', 'CILACAP')->etc())
        );
    }

    public function testDetailKabupatenBps(): void
    {
        $response = $this->withHeaders([
            'Authorization' => $this->tokenWilayah,
        ])->get('/api/wilayah/bps/kabupaten/222');

        $response->assertOk();
        $response->assertJson(fn (AssertableJson $json) => $json->has('meta')
            ->has('data', fn (AssertableJson $json) => $json->where('nama', 'TEGAL')->etc())
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
            ->has('data.18', fn (AssertableJson $json) => $json->where('nama', 'KROYA')->etc())
        );
    }

    public function testDetailKecamatanBps(): void
    {
        $response = $this->withHeaders([
            'Authorization' => $this->tokenWilayah,
        ])->get('/api/wilayah/bps/kecamatan/2636');

        $response->assertOk();
        $response->assertJson(fn (AssertableJson $json) => $json->has('meta')
            ->has('data', fn (AssertableJson $json) => $json->where('nama', 'KROYA')->etc())
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
            ->has('data.1', fn (AssertableJson $json) => $json->where('nama', 'PASIR PUTIH')->etc())
        );
    }

    public function testDetailDesaBps(): void
    {
        $response = $this->withHeaders([
            'Authorization' => $this->tokenWilayah,
        ])->get('/api/wilayah/bps/desa/24683');

        $response->assertOk();
        $response->assertJson(fn (AssertableJson $json) => $json->has('meta')
            ->has('data', fn (AssertableJson $json) => $json->where('nama', 'PASIR PUTIH')->etc())
        );
    }
}
