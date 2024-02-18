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
use Illuminate\Support\Facades\DB;

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

    public function create(CreateUserApiRequest $r): JsonResponse
    {
        $rv = $r->validate();
        DB::transaction(function () use ($req) {
            $user = UserApi::create([
                'user_id' => $this->getUserId(),
                'name' => $rv['name'],
                'nik' => $rv['nik'], 
                'phone' => $rv['phone'], 
                'email' => $rv['email']
            ]);
            UserApiAddress::create([
                'user_api_id' => $user->id,
                'country' => $rv['address']['country'],
                'state' => $rv['address']['state'],
                'city' => $rv['address']['city'],
                'postcode' => $rv['address']['postcode'],
                'detail' => $rv['address']['detail'],
            ]);

            $img = $this->createDefaultImage($user->name);

            UserApiImage::create([
                'user_api_id' => $user->id,
                'path' => dirname($img),
                'filename' => $basename($img)
            ]);
        });

        return $this->responseHelper->resourceNotFound('blm dibuat');
    }

    private function createDefaultImage(string $name): string
    {
        $dirUser = '/api/user/' . $u->id . '/img/';
        $path = Storage::disk('local')->path($dirUser);
        Storage::disk('local')->makeDirectory($dirUser);
        
        $finalPath = $path .'/'. Str::uuid()->toString();
        Avatar::create($user->name)
            ->setDimension(400, 400)
            ->setFontSize(200)
            ->save($finalPath);
        return $finalPath;
    }


    public function getUserImage(){
    }
    public function createUserImage(){
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
