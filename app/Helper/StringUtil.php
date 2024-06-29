<?php

namespace App\Helper;

use Illuminate\Support\Str;

class StringUtil
{
    public static function uuidWihoutStrip(): string
    {
        return Str::replace('-', '', Str::uuid());
    }

    public static function removeUuidPrefix(string $str): string
    {
        return Str::substr($str, 33);
    }
}
