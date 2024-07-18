<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Jwt\JwtHelper;
use App\Mail\ForgotPassword;
use App\Models\ForgotPasswordToken;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    public function __construct(
        protected JwtHelper $jwtHelper
    ) {}

    public function register(RegisterRequest $req): RedirectResponse
    {
        DB::transaction(function () use ($req) {
            $userReq = $req->validated();
            Log::info("REGISTERING USER : {$userReq['email']}");
            User::create([
                'username' => $userReq['username'],
                'first_name' => $userReq['first_name'],
                'last_name' => $userReq['last_name'],
                'sex' => $userReq['sex'],
                'email' => $userReq['email'],
                'password' => bcrypt($userReq['password']),
            ]);
        });

        return redirect()->route('page.login');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('page.login');
    }

    public function login(LoginRequest $req): RedirectResponse
    {
        $validated = $req->validated();
        if (Auth::attempt($validated)) {
            Log::info("LOGIN  {$validated['email']}");
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

        return response()->json(['is_exist' => $isExist]);
    }

    public function forgotPassword(Request $req)
    {
        $reqv = $req->validate(
            [
                'email' => 'required|email|exists:users,email',
            ],
            [
                'email.required' => 'Pastikan email terdaftar',
                'email.exists' => 'Pastikan email terdaftar',
            ]
        );

        $forgot = ForgotPasswordToken::create([
            'email' => $reqv['email'],
            'date' => Carbon::now()->format('Y-m-d'),
            'token' => Str::random(32),
        ]);

        Mail::to($forgot->email)->send(new ForgotPassword($forgot->token, $forgot->email));

        return redirect()->route('page.forgot-password')->with('send', true);
    }

    public function validateForgotPassword(Request $req)
    {
        $reqv = $req->validate([
            'token' => 'required',
            'email' => 'required',
        ]);

        $token = $reqv['token'];
        $email = $reqv['email'];

        $fgToken = ForgotPasswordToken::where('token', $token)
            ->where('email', $email)
            ->where('date', Carbon::now()->format('Y-m-d'))
            ->where('is_valid', true)
            ->first();

        if (is_null($fgToken)) {
            abort(404);
        }

        return redirect()->route('page.resetPassword')->with(['email' => $email, 'token' => $token]);
    }

    public function resetPassword(Request $req)
    {
        $reqv = null;
        try {
            $reqv = $req->validate([
                'email' => 'required|email',
                'token' => 'required',
                'password' => 'required|confirmed|min:8',
            ]);
        } catch (\Exception $e) {
            Log::info("invalid reset password request {$e->getMessage()} ");
            abort(404);
        }

        $token = $reqv['token'];
        $email = $reqv['email'];
        $password = $reqv['password'];

        $fgToken = ForgotPasswordToken::where('token', $token)
            ->where('email', $email)
            ->where('date', Carbon::now()->format('Y-m-d'))
            ->where('is_valid', true)
            ->first();

        if (is_null($fgToken)) {
            abort(419);
        }

        DB::transaction(function () use ($email, $password, $fgToken) {
            $user = User::where('email', $email)->firstOrFail();
            $user->password = bcrypt($password);
            $user->save();

            $fgToken->is_valid = false;
            $fgToken->save();
        });

        return redirect()->route('page.resetPassword')->with('send', true);
    }
}
