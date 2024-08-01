<?php

namespace Tests\Feature\Api;

use Tests\TestCase;

class TodolistTest extends TestCase
{
    public function test_login_screen_can_be_rendered(): void
    {
        $response = $this->get('/api/todolist');

        //        $response->dump();
        //        $response->assertStatus(200);
    }
}
