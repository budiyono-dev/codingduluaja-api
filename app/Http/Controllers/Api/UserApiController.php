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
        $req->validated([
            'keyword'=> 'string',
            'order_by' =>'string|in',
            'search_by' => 'string|in'
        ]);
        $user = new UserApi();
        $user->name('name');
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
