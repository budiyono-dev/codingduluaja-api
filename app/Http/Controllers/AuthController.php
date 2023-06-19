<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Requests\RegisterRequest;

class AuthController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function register(RegisterRequest $req) : View 
    {
        dd($req->all());

    } 
}
