<?php

namespace App\Helper;

use App\Constants\ResponseCode;
use Illuminate\Http\JsonResponse;

class ResponseHelper
{
    public function success(
        string $requestId,
        string $message,
        string $responseCode,
        object|array|null $data
    ): JsonResponse {
        return $this->buildJson($requestId, true, $message, $responseCode, 200, $data);
    }

    public function resourceNotFound(string $requestId): JsonResponse
    {
        return $this->buildJson($requestId, false, 'Resource Not Found', ResponseCode::RESOURCE_NOT_FOUND, 404, null);
    }

    public function notFound(string $requestId, string $message, string $responseCode): JsonResponse
    {
        return $this->buildJson($requestId, false, $message, $responseCode, 404, null);
    }

    public function methodNotAllowed($data): JsonResponse
    {
        return $this->buildJson(null, false, 'Method Not Allowed', ResponseCode::METHOD_NOT_ALLOWED, 495, $data);
    }

    public function error(
        ?string $requestId,
        string $responseCode,
        string $message,
        int $httpStatusCode,
        object|array|null $data
    ): JsonResponse {
        return $this->buildJson($requestId, false, $message, $responseCode, $httpStatusCode, $data);
    }

    public function validationError(string $requestId, string $responseCode, array $errorMessage): JsonResponse
    {
        return $this->error($requestId, $responseCode, 'Validation Error', 400, $errorMessage);
    }

    public function serverError(?string $requestId, object|array $data): JsonResponse
    {
        return $this->error($requestId, ResponseCode::INTERNAL_SERVER_ERROR, 'internal server error', 500, $data);
    }

    public function unAuthorize(string $requestId): JsonResponse
    {
        return $this
            ->error(
                $requestId,
                ResponseCode::UNAUTHORIZED,
                'Unauthorized',
                401,
                ['request' => 'Unauthorized request']
            );
    }

    private function buildJson(
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
