<?php

namespace Tests\Feature\Api;

use App\Models\Api\User\UserApi;
use App\Services\Api\UserApiService;
use App\Services\Api\UserApiServiceImpl;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Group;
use Tests\TestCase;

#[Group('userApiTest')]
class UserApiTest extends TestCase
{
    use RefreshDatabase;

    protected string $token = '';

    protected UserApiService $userApiService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->token = $this->createResourceToken(4);

        $this->app->singleton(UserApiService::class, UserApiServiceImpl::class);
        $this->userApiService = $this->app->make(UserApiService::class);
    }

    public function testInsetUser(): void
    {
        $jsonInsert = [
            'name' => 'Latika Mardhi',
            'nik' => '1302910703153399',
            'phone' => '996539651440',
            'email' => 'harsanto.wijaya@example.org',
            'address' => [
                'country' => 'Indonesia',
                'state' => 'Sumatera Barat',
                'city' => 'Palopo',
                'postcode' => '13332',
                'detail' => 'Kpg. Taman No. 393, Kendari 83824, Sumatra Barat',
            ],
        ];
        $response = $this->withHeaders([
            'Authorization' => $this->token,
        ])->post('/api/user', $jsonInsert);

        $response->assertOk();
        $response->assertJsonMissingPath('user_id');
        $response->assertJsonFragment($jsonInsert);
    }

    public function testGetListUser(): void
    {
        $this->userApiService->dummy(2, 5);
        $response = $this->withHeaders([
            'Authorization' => $this->token,
        ])->get('/api/user');

        $response->assertOk();
        $response->assertJsonMissingPath('user_id');
        $response->assertJsonStructure([
            'meta' => ['request_id', 'success', 'code', 'message'],
            'data' => [
                'current_page', 'per_page', 'from', 'to', 'first_page_url', 'next_page_url', 'path',
                'data' => [
                    '*' => ['id', 'name', 'nik', 'phone', 'email', 'created_at', 'updated_at'],
                ],
            ]
        ]);
    }

    public function testGetUserDetail(): void
    {
        $this->userApiService->dummy(2, 5);
        $u = UserApi::query()->with('address', 'image')->first();
        $addr = $u->address;
        $img = $u->img;
        $response = $this->withHeaders([
            'Authorization' => $this->token,
        ])->get('/api/user/'.$u->id);

        $response->assertOk();
        $response->assertJsonMissingPath('user_id');
        $response->assertJsonFragment([
            'name' => $u->name,
            'nik' => $u->nik,
            'phone' => $u->phone,
            'email' => $u->email,
            'address' => [
                'country' => $addr->country,
                'state' => $addr->state,
                'city' => $addr->city,
                'postcode' => $addr->postcode,
                'detail' => $addr->detail,
            ],
            'image' => [
                'filename' => $img->filename,
            ],
        ]);
    }
}
