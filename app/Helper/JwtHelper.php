<?php

namespace App\Helper;

use App\Dto\JwtParam;
use Firebase\JWT\JWT;

class JwtHelper
{
    public function __construct()
    {
        //
    }

    public static function createToken(JwtParam $param, string $key, array $payload)
    {
        $jwt = JWT::encode($payload, $key, 'HS256');
    }

    private static function createKey() {}

    public static function expToUnixTime(int $expValue, ExpUnit $unit): int
    {
        $now = Carbon::now();
        $result = match ($unit) {
            ExpUnit::DAY => $now->addDays($expValue),
            ExpUnit::MONTH => $now->addMonths($expValue),
            ExpUnit::YEAR => $now->addYears($expValue),
            ExpUnit::HOUR => $now->addHours($expValue)
        };

        return $result->timestamp;
    }
}
