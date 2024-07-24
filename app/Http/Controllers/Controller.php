<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

abstract class Controller
{
    public function authUserId()
    {
        $userId = Auth::user()?->id;
        if (is_null($userId)) {
            abort(401);
        }

        return $userId;
    }
}
