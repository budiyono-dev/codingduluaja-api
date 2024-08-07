<?php

namespace App\Helper;

use App\Constants\ExpUnit;
use App\Dto\JwtParam;
use Carbon\Carbon;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Support\Facades\Log;

class JwtHelper
{
    public static function createToken(string $key, JwtParam $param): string
    {
        $payload = [
            'sub' => $param->userId,
            'appId' => $param->clientId,
            'resId' => $param->resourceId,
            'exp' => $param->exp,
        ];

        return JWT::encode($payload, $key, 'HS256');
    }

    public static function createKey(JwtParam $param): string
    {
        return md5(json_encode($param));
    }

    public static function unpackToken(string $key, string $token)
    {
        $decoded = null;
        try {
            Log::debug('[jwt.HELPER] unpack', ['token' => $token]);
            $decoded = JWT::decode($token, new Key($key, 'HS256'));
        } catch (\LogicException $e) {
            Log::error('[jwt.HELPER] ERROR', ['msg' => $e->getMessage()]);
        } catch (\UnexpectedValueException $e) {
            Log::error('[jwt.HELPER] ERROR', ['msg' => $e->getMessage()]);
        }

        return $decoded;
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

    public static function validateExp(int $exp)
    {
        return $exp > time();
    }

    public static function extractIdentifier(string $identifier)
    {
        [$userId,$resId,$appId] = explode(';', $identifier);

        return [
            'userId' => $userId,
            'resId' => $resId,
            'appId' => $appId,
        ];
    }
}
