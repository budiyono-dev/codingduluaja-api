<?php

namespace App\Http\Controllers\Api;

use App\Constants\ResponseCode;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\CreateUserApiRequest;
use App\Http\Requests\Api\User\SearchUserApiRequest;
use App\Http\Requests\Api\User\UploadImageUserApiRequest;
use App\Services\Api\UserApiService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class UserApiController extends Controller
{
    public function __construct(
        protected UserApiService $userApiService,
    ) {}

    public function get(SearchUserApiRequest $r): JsonResponse
    {
        $rv = $r->validated();
        Log::info('[USER_API] search user params :', ['params' => $rv]);

        return $this->apiSuccess(
            'Successfully Get List User',
            ResponseCode::SUCCESS_GET_DATA,
            $this->userApiService->get($this->apiUserId(), $rv)
        );
    }

    public function create(CreateUserApiRequest $r): JsonResponse
    {
        $rv = $r->validated();

        return $this->apiSuccess(
            'User created successfully',
            ResponseCode::SUCCESS_CREATE_DATA,
            $this->userApiService->create($this->apiUserId(), $rv)
        );
    }

    public function getImage(string $id)
    {
        Log::info('[USER_API] getImage of user '.$id);
        $fp = $this->userApiService->getImage($this->apiUserId(), $id);

        return response()->file($fp, ['Content-Type' => 'image/png']);
    }

    public function updateImage(string $id, UploadImageUserApiRequest $r)
    {
        $rv = $r->validated();
        $file = $rv['file'];
        $img = $this->userApiService->updateImage($this->apiUserId(), $id, $file);

        return $this->apiSuccess('Image Updated Successfully', ResponseCode::SUCCESS_EDIT_DATA);
    }

    public function detail(string $id): JsonResponse
    {
        Log::info('[USER_API] get detail of user '.$id);

        return $this->apiSuccess(
            'Successfully Get User',
            ResponseCode::SUCCESS_GET_DATA,
            $this->userApiService->detail($this->apiUserId(), $id)
        );
    }

    public function edit(string $id, CreateUserApiRequest $r): JsonResponse
    {
        Log::info("[USER_API] Edit User {$id}");
        $rv = $r->validated();

        return $this->apiSuccess(
            'Data Updated Successfully',
            ResponseCode::SUCCESS_EDIT_DATA,
            $this->userApiService->edit($this->apiUserId(), $id, $rv)
        );
    }

    public function delete(string $id): JsonResponse
    {
        Log::info('[USER_API] delete user '.$id);
        $this->userApiService->delete($this->apiUserId(), $id);

        return $this->apiSuccess('Successfully Delete User', ResponseCode::SUCCESS_DELETE_DATA);
    }
}
