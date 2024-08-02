<?php

namespace Tests\Feature\Api;

use Database\Seeders\AllWilayahSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class WilayahDagriTest extends TestCase
{
    use RefreshDatabase;

    protected string $tokenWilayah = '';

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(AllWilayahSeeder::class);
        $this->tokenWilayah = $this->createResourceToken(3);
    }

    public function testListProvinsiDagri(): void
    {
        $response = $this->withHeaders([
            'Authorization' => $this->tokenWilayah,
        ])->get('/api/wilayah/dagri/provinsi');

        $response->assertOk();
        $response->assertJson(fn (AssertableJson $json) => $json->has('meta')
            ->has('data')
            ->has('data.0', fn (AssertableJson $json) => $json->where('nama', 'ACEH')->where('id', 1))
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
            ->has('data.0', fn (AssertableJson $json) => $json->where('nama', 'KAB. CILACAP')->etc())
        );
    }

    public function testDetailKabupatenDagri(): void
    {
        $response = $this->withHeaders([
            'Authorization' => $this->tokenWilayah,
        ])->get('/api/wilayah/dagri/kabupaten/222');

        $response->assertOk();
        $response->assertJson(fn (AssertableJson $json) => $json->has('meta')
            ->has('data', fn (AssertableJson $json) => $json->where('nama', 'KOTA TEGAL')->etc())
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
            ->has('data.18', fn (AssertableJson $json) => $json->where('nama', 'KROYA')->etc())
        );
    }

    public function testDetailKecamatanDagri(): void
    {
        $response = $this->withHeaders([
            'Authorization' => $this->tokenWilayah,
        ])->get('/api/wilayah/dagri/kecamatan/2636');

        $response->assertOk();
        $response->assertJson(fn (AssertableJson $json) => $json->has('meta')
            ->has('data', fn (AssertableJson $json) => $json->where('nama', 'KROYA')->etc())
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
            ->has('data.1', fn (AssertableJson $json) => $json->where('nama', 'PASIR PUTIH')->etc())
        );
    }

    public function testDetailDesaDagri(): void
    {
        $response = $this->withHeaders([
            'Authorization' => $this->tokenWilayah,
        ])->get('/api/wilayah/dagri/desa/24683');

        $response->assertOk();
        $response->assertJson(fn (AssertableJson $json) => $json->has('meta')
            ->has('data', fn (AssertableJson $json) => $json->where('nama', 'PASIR PUTIH')->etc())
        );
    }
}
