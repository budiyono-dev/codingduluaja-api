<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;

class AuthController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function register(RegisterRequest $req): View
    {
        DB::transaction(function () use ($req) {
            $userReq = $req->validated();
            Log::info('registering user :' . $userReq['email']);
            User::create([
                'username' => Str::uuid()->toString(),
                'first_name' => $userReq['first_name'],
                'last_name' => $userReq['last_name'],
                'sex' => $userReq['sex'],
                'email' => $userReq['email'],
                'password' => bcrypt($userReq['password'])
            ]);
        });
        return view('page.login');
    }

    public function doLogin()
    {

    }
    /**
     *             $table->string('username')->unique();
     * $table->string('first_name', 50);
     * $table->string('last_name', 50)->nullable()->default(null);
     * $table->string('sex')->nullable();
     * $table->string('email', 50)->unique();
     * $table->string('password', 50);
     * $table->timestamp('email_verified_at')->nullable();
     * $table->rememberToken();
     * $table->timestamps();
     */
}
