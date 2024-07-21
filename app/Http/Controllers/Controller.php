<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

abstract class Controller
{
    public function authUserId(): int
    {
        return Auth::user()->id;
    }
}
