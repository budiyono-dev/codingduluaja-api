<?php

namespace App\Helper;

use App\Constants\ExpUnit;
use App\Dto\JwtParam;
use Carbon\Carbon;
use Firebase\JWT\JWT;

class JwtHelper
{
    public static function createToken(string $key, array $payload): string
    {
        return JWT::encode($payload, $key, 'HS256');
    }

    public static function createKey(JwtParam $param): string
    {
        return md5(json_encode($param));
    }

    public static function unpackToken(string $key, string $token)
    {
        return JWT::decode($token, new Key($key, 'HS256'));
    }

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

    public static function generateIdentifier(int $userId, int $resId, int $appId)
    {
        return "{$userId};{$resId};{$appId}";
    }

    public static function extractIdentifier(string $identifier)
    {
        return [$userId,$resId,$appId] = explode(';', $identifier);
    }
}
