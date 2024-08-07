<?php

namespace App\Http\Controllers;

use App\Helper\ContextHelper;
use App\Helper\ResponseBuilder;
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

    public function apiSuccess(string $msg, string $code, mixed $data = null)
    {
        return ResponseBuilder::success(ContextHelper::getRequestId(), $msg, $code, $data);
    }
}
