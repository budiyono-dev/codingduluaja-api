<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        // dd('jalankan test');
            //         $table->id();
            // $table->string('username')->unique();
            // $table->string('firstname');
            // $table->string('lastname');
            // $table->string('sex');
            // $table->string('email')->unique();
            // $table->string('password');
            // $table->timestamp('email_verified_at')->nullable();
        // $user = User::create([
        //     'username' => 'myusername',
        //     'firstname' => 'budiyono',
        //     'email'=>'budi@mail.com'
        // ]);
        $user = new User();
        $user->username = 'myusername';
        $user->firstname = 'firstname';
        $user->email = 'budi@maiil.com';
        $user->password = 'mypassword';
        $user->save();

        $data = User::all()->toArray();
        dd($data);
    }
}
