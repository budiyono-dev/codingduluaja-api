<?php

namespace App\Helper;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Context;
use Illuminate\Support\Str;

class ContextHelper
{
    const REQUEST_CTX = 'request-context';

    const USER_ID = 'user_id';

    const CLIENT_APP_ID = 'client_app_id';

    const CLIENT_RESOURCE_ID = 'client_resource_id';

    const REQUEST_ID = 'request_id';

    const PATH = 'path';

    const METHOD = 'method';

    const IP = 'ip';

    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public static function init(Request $req)
    {
        Context::add(self::REQUEST_ID, Str::uuid()->toString());
        Context::addHidden(self::METHOD, $req->method());
        Context::addHidden(self::PATH, $req->path());
        Context::addHidden(self::IP, $req->ip());
    }

    public static function getIp()
    {
        return Context::getHidden(self::IP);
    }

    public static function getMethod()
    {
        return Context::getHidden(self::METHOD);
    }

    public static function getPath()
    {
        return Context::getHidden(self::PATH);
    }
}
