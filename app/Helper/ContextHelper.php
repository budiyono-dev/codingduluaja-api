<?php

namespace App\Helper;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Context;
use Illuminate\Support\Str;

class ContextHelper
{
    /**
     * Info.
     */
    const REQUEST_ID = 'request_id';

    const PATH = 'path';

    const METHOD = 'method';

    const IP = 'ip';

    /**
     * Api Token.
     */
    const USER_ID = 'user_id';

    const CLIENT_APP_ID = 'client_app_id';

    const CLIENT_RESOURCE_ID = 'client_resource_id';

    public static function init(Request $req)
    {
        Context::add(self::REQUEST_ID, Str::uuid()->toString());
        Context::addHidden(self::METHOD, $req->method());
        Context::addHidden(self::PATH, $req->path());
        Context::addHidden(self::IP, $req->ip());
    }

    public static function initTokenContext(array $data)
    {
        Context::add(self::USER_ID, $data['userId']);
        Context::addHidden(self::CLIENT_APP_ID, $data['appId']);
        Context::addHidden(self::CLIENT_RESOURCE_ID, $data['resId']);
    }

    public static function getIp(): string
    {
        return Context::getHidden(self::IP);
    }

    public static function getRequestId(): string
    {
        return Context::get(self::REQUEST_ID);
    }

    public static function getMethod(): string
    {
        return Context::getHidden(self::METHOD);
    }

    public static function getPath(): string
    {
        return Context::getHidden(self::PATH);
    }

    public static function getUserId(): string
    {
        return Context::get(self::USER_ID);
    }

    public static function getAppId(): string
    {
        return Context::getHidden(self::CLIENT_APP_ID);
    }

    public static function getResId(): string
    {
        return Context::getHidden(self::CLIENT_RESOURCE_ID);
    }
}
