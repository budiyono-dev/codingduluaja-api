<?php

namespace App\Http\Controllers\Api;

use App\Helper\ResponseHelper;
use Illuminate\Routing\Controller;
use App\Models\Api\User\UserApi;
use App\Traits\ApiContext;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    use ApiContext;

    public function __construct(
        protected ResponseHelper $responseHelper
    ) {
    }
    public function get(Request $req): JsonResponse
    {
        [
            'keyword' => $keyword,
            'order_by' => $orderBy,
            'search_by' => $searchBy,
            'order_direction' => $orderDirection,

        ] = $req->validated([
            'keyword' => 'string|min:1',
            'order_by' => 'string|in:name,created_at,updated_at',
            'search_by' => 'string|in:name,nik,phone,email',
            'order_direction' => 'string|in:desc,asc',
        ]);

        return $this->responseHelper->resourceNotFound('blm dibuat');
    }
    public function create(): JsonResponse
    {
        return $this->responseHelper->resourceNotFound('blm dibuat');
    }
    public function detail(string $id): JsonResponse
    {
        return $this->responseHelper->resourceNotFound('blm dibuat');
    }
    public function edit(string $id): JsonResponse
    {
        return $this->responseHelper->resourceNotFound('blm dibuat');
    }
    public function delete(string $id): JsonResponse
    {
        return $this->responseHelper->resourceNotFound('blm dibuat');
    }
}
