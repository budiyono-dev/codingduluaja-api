<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Context;

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

    public function apiUserId()
    {
        $userId = Context::get('user_id');
        
        if (is_null($userId)) {
            abort(401);
        }

        return $userId;
    }
}
