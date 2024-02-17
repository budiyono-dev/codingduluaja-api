<?php

namespace App\Http\Controllers\Api;

use App\Dto\UserApiDto;
use App\Traits\ApiContext;
use App\Models\Api\User\UserApi;
use App\Constants\ResponseCode;
use App\Helper\ResponseHelper;
use App\Http\Requests\Api\User\CreateUserApiRequest;
use Illuminate\Routing\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserApiController extends Controller
{
    use ApiContext;

    public function __construct(
        protected ResponseHelper $responseHelper
    ) {
    }
    
    public function get(Request $req): JsonResponse
    {
        $reqv = $req->validate([
                'search' => 'string|min:1',
                'order_by' => 'string|in:name,created_at,updated_at',
                'search_by' => 'string|in:name,nik,phone,email',
                'order_direction' => 'string|in:desc,asc',
            ]);

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
            'Successfully Get List User',
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

    public function create(Request $r): JsonResponse
    {
        $rv = $r->validate([
            'req' => 'required|string',
            'img' => 'mimes:png,jpeg|max:1024'
        ]);
        $fr = new CreateUserApiRequest();
        // dd($rv, json_decode($rv['req']));
        $valid  = Validator::make(json_decode($rv['req'], true), $fr->rules());
        // dd($valid->fails());
        dd($valid->validate());
        return $this->responseHelper->resourceNotFound('blm dibuat');
    }
    public function detail(string $id): JsonResponse
    {
        $user = UserApi::findOrFail($id);
        if ($user->user_id != $this->getUserId()){
            return $this->responseHelper->notFound('user');
        }
        return $this->responseHelper->success(
            $this->getRequestId(),
            'Successfully Get User',
            ResponseCode::SUCCESS_GET_DATA,
            UserApiDto::fromUserApi($user)
        );
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
