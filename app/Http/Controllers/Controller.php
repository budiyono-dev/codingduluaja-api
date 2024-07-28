<?php

namespace App\Http\Controllers;

use App\Helper\ContextHelper;
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

    public function apiUserId()
    {
        $userId = ContextHelper::getUserId();

        if (is_null($userId)) {
            abort(401);
        }

        return $userId;
    }

    public function apiReqId()
    {
        return ContextHelper::getRequestId();
    }
}
