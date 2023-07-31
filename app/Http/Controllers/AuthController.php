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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Symfony\Component\VarDumper\Dumper\esc;

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
        return redirect()->route('page.login');
    }

    public function logout(Request $request) : RedirectResponse {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('page.login');
    }

    public function login(LoginRequest $req)
    {
        $validated = $req->validated();
        Log::info('LOGIN '.$validated['email']);
        if (Auth::attempt($validated)) {
            request()->session()->regenerate();
            return redirect()->route('page.dashboard');
        } 

        return back()->withErrors([
            'error' => 'Invalid Email or Password',
        ]);
    }

    public function checkUsername(string $username): JsonResponse
    {
        $isExist = false;

        $count = User::where('username', $username)->count();
        if ($count > 0) {
            $isExist = true;
        }

        return response()->json(['is_exist'=> $isExist]);

    }
}
