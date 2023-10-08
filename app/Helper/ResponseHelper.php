<?php

namespace App\Helper;

use Illuminate\Http\JsonResponse;

class ResponseHelper
{
    public function successResponse(string $message, object|array|null $data): JsonResponse
    {
        return response()->json([
            'meta' => [
                'success' => true,
                'code' => 'OK',
                'message' => $message
            ],
            'data' => $data
        ], 200);
    }

    public function notFoundResponse(string $message): JsonResponse
    {
        return response()->json([
            'meta' => [
                'success' => false,
                'code' => 'CDA_R11',
                'message' => $message
            ],
            'data' => null
        ], 404);
    }

    public function genericFoundResponse(): JsonResponse
    {
        return response()->json([
            'meta' => [
                'success' => false,
                'code' => '404',
                'message' => 'Target Not Found'
            ],
            'data' => null
        ], 404);
    }

    private function errorResponse(string $code, string $message, int $httpStatusCode, object|array|null $data): JsonResponse
    {
        return response()->json([
            'meta' => [
                'success' => false,
                'code' => $code,
                'message' => $message
            ],
            'data' => $data
        ], $httpStatusCode);
    }

    public function validationErrorResponse(string $code, array $errorMessage): JsonResponse
    {
        return $this->errorResponse($code, 'validation error', 400, $errorMessage);
    }

    public function serverErrorResponse(object|array $data): JsonResponse
    {
        return $this->errorResponse('CDA-R500', 'internal server error', 500, $data);
    }
}
