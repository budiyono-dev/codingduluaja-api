<?php

namespace App\Http\Controllers\Api;

use App\Dto\UserApiDto;
use App\Traits\ApiContext;
use App\Models\Api\User\UserApi;
use App\Constants\ResponseCode;
use App\Helper\ResponseHelper;
use Illuminate\Routing\Controller;
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
        // [
        //     'search' => $search,
        //     'order_by' => $orderBy,
        //     'search_by' => $searchBy,
        //     'order_direction' => $orderDirection,

        // ] = $req->validate([
        //     'search' => 'string|min:1',
        //     'order_by' => 'string|in:name,created_at,updated_at',
        //     'search_by' => 'string|in:name,nik,phone,email',
        //     'order_direction' => 'string|in:desc,asc',
        // ]);
        $reqv = $req->validate([
                'search' => 'string|min:1',
                'order_by' => 'string|in:name,created_at,updated_at',
                'search_by' => 'string|in:name,nik,phone,email',
                'order_direction' => 'string|in:desc,asc',
            ]);
        // return $this->responseHelper->success(
        //     $this->getRequestId(),
        //     'Successfully Get User',
        //     ResponseCode::SUCCESS_GET_DATA,
        //     ['s'=>json_encode($search)]
        // );
        $user_id = $this->getUserId();
        $data = [];

        if(isset($reqv['search']) && !is_null($search)) {
            $search = $reqv['search'] ?? null;
            $orderBy = $reqv['order_by'] ?? null;
            $searchBy = $reqv['search_by'] ?? null;
            $orderDirection = $reqv['order_direction'] ?? null;
            $data = $this->search(true, $search, $orderBy, $searchBy, $orderDirection); 
        } else {
            $data = $this->search();
        }
        
        return $this->responseHelper->success(
            $this->getRequestId(),
            'Successfully Get User',
            ResponseCode::SUCCESS_GET_DATA,
            UserApiDto::fromUserApiCollection($data)
        );
    }

    private function search(bool $isSearch = false, string $search = null, string $orderBy = null, 
    string $searchBy = null, string $orderDirection = null)
    {
        $query = UserApi::where('user_id', $this->getUserId())
        ->with(['address','image']);

        if(!$isSearch) {
            return $query->get();
        }

        return ['message'=>'blm ada data'];

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
