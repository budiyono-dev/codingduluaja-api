<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class AuthController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function register(RegisterRequest $req): RedirectResponse
    {
        DB::transaction(function () use ($req) {
            $userReq = $req->validated();
            Log::info('registering user :' . $userReq['email']);
            User::create([
                'username' => $userReq['username'],
                'first_name' => $userReq['first_name'],
                'last_name' => $userReq['last_name'],
                'sex' => $userReq['sex'],
                'email' => $userReq['email'],
                'password' => bcrypt($userReq['password'])
            ]);
        });
        return redirect()->route('login');
    }

    public function doLogin(LoginRequest $req)
    {
        $validated = $req->validated();
        dd($validated);

    }

    public function checkUsername(string $username): JsonResponse
    {
        $isExist = false;
        if (blank($username)) {
            return response()->json('username not found', 404);
        }

        $count = User::where('username', $username)->count();
        if ($count > 0) {
            $isExist = true;
        }

        return response()->json(['is_exist'=> $isExist]);

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
