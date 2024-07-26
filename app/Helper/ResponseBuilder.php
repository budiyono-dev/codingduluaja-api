<?php

namespace App\Helper;

use App\Constants\ResponseCode;
use Illuminate\Http\JsonResponse;

class ResponseBuilder
{
    public static function success(
        string $requestId,
        string $message,
        string $responseCode,
        object|array|null $data
    ): JsonResponse {
        return self::buildJson($requestId, true, $message, $responseCode, 200, $data);
    }

    public static function resourceNotFound(string $requestId): JsonResponse
    {
        return self::buildJson($requestId, false, 'Resource Not Found', ResponseCode::RESOURCE_NOT_FOUND, 404, null);
    }

    public static function notFound(string $requestId, string $message, string $responseCode): JsonResponse
    {
        return self::buildJson($requestId, false, $message, $responseCode, 404, null);
    }

    public static function methodNotAllowed($data): JsonResponse
    {
        return self::buildJson(null, false, 'Method Not Allowed', ResponseCode::METHOD_NOT_ALLOWED, 495, $data);
    }

    public static function error(
        ?string $requestId,
        string $responseCode,
        string $message,
        int $httpStatusCode,
        object|array|null $data
    ): JsonResponse {
        return self::buildJson($requestId, false, $message, $responseCode, $httpStatusCode, $data);
    }

    public static function validationError(string $requestId, string $responseCode, array $errorMessage): JsonResponse
    {
        return self::error($requestId, $responseCode, 'Validation Error', 400, $errorMessage);
    }

    public static function serverError(?string $requestId, object|array $data): JsonResponse
    {
        return self::error($requestId, ResponseCode::INTERNAL_SERVER_ERROR, 'internal server error', 500, $data);
    }

    public static function unAuthorize(string $requestId): JsonResponse
    {
        return self::error(
                $requestId,
                ResponseCode::UNAUTHORIZED,
                'Unauthorized',
                401,
                ['request' => 'Unauthorized request']
            );
    }

    public static function buildJson(
        ?string $requestId,
        bool $success,
        string $message,
        string $responseCode,
        int $httpStatusCode,
        object|array|null $data
    ): JsonResponse {
        return response()->json([
            'meta' => [
                'request_id' => $requestId,
                'success' => $success,
                'code' => $responseCode,
                'message' => $message,
            ],
            'data' => $data,
        ], $httpStatusCode);
    }
}
