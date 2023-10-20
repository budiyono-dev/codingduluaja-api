<?php

namespace App\Helper;

use Illuminate\Http\JsonResponse;

class ResponseHelper
{
    public function successResponse(string $requestId, string $message, object|array|null $data): JsonResponse
    {
        return $this->buildResponse($requestId, false, $message, $errorCode, 200, $data);
        // return response()->json([
        //     'meta' => [
        //         'success' => true,
        //         'code' => 'OK',
        //         'message' => $message
        //     ],
        //     'data' => $data
        // ], 200);
    }

    public function notFoundResponse(string $requestId, string $message, string $errorCode): JsonResponse
    {
        return $this->buildResponse($requestId, false, $message, $errorCode, 404, null);
        // return response()->json([
        //     'meta' => [
        //         'success' => false,
        //         'code' => 'CDA_R11',
        //         'message' => $message
        //     ],
        //     'data' => null
        // ], 404);
    }

    private function errorResponse(string $requestId, string $code, string $message,
        int $httpStatusCode, object|array|null $data): JsonResponse
    {
        return $this->buildResponse($requestId, false, $message, $errorCode, $httpStatusCode, $data);
        // return response()->json([
        //     'meta' => [
        //         'success' => false,
        //         'code' => $code,
        //         'message' => $message
        //     ],
        //     'data' => $data
        // ], $httpStatusCode);
    }

    public function validationErrorResponse(string $code, array $errorMessage): JsonResponse
    {
        return $this->errorResponse($code, 'validation error', 400, $errorMessage);
    }

    public function serverErrorResponse(object|array $data): JsonResponse
    {
        return $this->errorResponse('CDA-R500', 'internal server error', 500, $data);
    }

    public function unAutorizeResponse(): JsonResponse
    {
        return $this->errorResponse('CDA-400', 'validation error', 401, ['request' => 'Unauthorized request']);
    }

    private function buildResponse(string $requestId, bool $success, string $message
        ,int $errorCode, int $httpStatusCode, object|array|null $data): JsonResponse
    {
        return response()->json([
            'meta' => [
                'request_id' => $requestId
                'success' => $success,
                'code' => $errorCode,
                'message' => $message
            ],
            'data' => $data
        ], $httpStatusCode);

    }
}
