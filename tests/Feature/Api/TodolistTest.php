<?php

namespace Tests\Feature\Api;

use App\Models\Api\Todolist;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use PHPUnit\Framework\Attributes\Group;
use Tests\TestCase;

#[Group('todolistTest')]
class TodolistTest extends TestCase
{
    use RefreshDatabase;

    protected string $token = '';

    protected string $dayNow = '';

    protected string $minusDay = '';

    protected string $plusDay = '';

    protected function setUp(): void
    {
        parent::setUp();
        $this->token = $this->createResourceToken(1);
        $this->dayNow = Carbon::now()->format('Y-m-d');
        $this->minusDay = Carbon::now()->subDays(2)->format('Y-m-d');
        $this->plusDay = Carbon::now()->addDays(2)->format('Y-m-d');
    }

    private function createDummyTodo()
    {
        return Todolist::create([
            'user_id' => 2,
            'date' => Carbon::now()->format('Y-m-d'),
            'name' => 'Berenang',
            'description' => 'Terus Berenang - Terus Berenang',
        ]);
    }

    public function testCreateTodolistBackDate(): void
    {
        $response = $this->withHeaders([
            'Authorization' => $this->token,
        ])->post('/api/todolist', [
            'date' => $this->minusDay,
            'name' => 'watching football',
            'description' => 'MU VS Liverpol',
        ]);
        $response->assertBadRequest();
    }

    public function testCreateTodolist(): void
    {
        $response = $this->withHeaders([
            'Authorization' => $this->token,
        ])->post('/api/todolist', [
            'date' => $this->dayNow,
            'name' => 'watching football',
            'description' => 'MU VS Liverpol',
        ]);

        $response->assertOk();
        $response->assertJson(fn (AssertableJson $json) => $json
            ->has('meta')
            ->has('data', fn (AssertableJson $json) => $json->where('name', 'watching football')->etc())
        );
    }

    public function testGetListTodolist(): void
    {
        $s = $this->createDummyTodo();

        $response = $this->withHeaders([
            'Authorization' => $this->token,
        ])->get('/api/todolist');

        $response->assertOk();
        $response->assertJson(fn (AssertableJson $json) => $json
            ->has('meta')
            ->has('data')
            ->has('data.0', fn (AssertableJson $json) => $json->where('name', 'Berenang')->etc())
        );
    }

    public function testGetTodolist(): void
    {
        $s = $this->createDummyTodo();
        $response = $this->withHeaders([
            'Authorization' => $this->token,
        ])->get('/api/todolist/'.$s->id);

        $response->assertOk();
        $response->assertJsonMissingPath('user_id');
        $response->assertJson(fn (AssertableJson $json) => $json
            ->has('meta')
            ->has('data', fn (AssertableJson $json) => $json->where('name', 'Berenang')->etc())
        );
    }

    public function testDeleteTodolist(): void
    {
        $s = $this->createDummyTodo();

        $response = $this->withHeaders([
            'Authorization' => $this->token,
        ])->delete('/api/todolist/'.$s->id);

        $response->assertOk();
        $response->assertJsonMissingPath('user_id');
        $response->assertJson(fn (AssertableJson $json) => $json
            ->has('meta')
            ->has('data')
        );
    }

    public function testEditTodolist(): void
    {
        $s = $this->createDummyTodo();

        $response = $this->withHeaders([
            'Authorization' => $this->token,
        ])->put('/api/todolist/'.$s->id, [
            'date' => $this->plusDay,
            'name' => 'Maraton One Piece',
            'description' => 'Maraton One Piece',
        ]);

        $response->assertOk();
        $response->assertJsonMissingPath('user_id');
        $response->assertJson(fn (AssertableJson $json) => $json
            ->has('meta')
            ->has('data', fn (AssertableJson $json) => $json->where('name', 'Maraton One Piece')->etc())
        );
    }
}
