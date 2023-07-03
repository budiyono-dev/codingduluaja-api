<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AuthController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function register(RegisterRequest $req): View
    {
        DB::transaction(function () use ($req) {
            dd($req->all());

        });
        return view('page.welcome');
    }
}
