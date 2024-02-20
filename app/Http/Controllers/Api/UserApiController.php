<?php

namespace App\Http\Controllers\Api;

use App\Dto\UserApiDto;
use App\Models\Api\User\UserApiAddress;
use App\Models\Api\User\UserApiImage;
use App\Traits\ApiContext;
use App\Models\Api\User\UserApi;
use App\Constants\ResponseCode;
use App\Helper\ResponseHelper;
use App\Http\Requests\Api\User\CreateUserApiRequest;
use App\Http\Requests\Api\User\SearchUserApiRequest;
use Illuminate\Routing\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Optional;
use Laravolt\Avatar\Avatar;
use Illuminate\Support\Str;
use League\MimeTypeDetection\EmptyExtensionToMimeTypeMap;

class UserApiController extends Controller
{
    use ApiContext;

    public function __construct(
        protected ResponseHelper $responseHelper
    ) {
    }

    public function get(SearchUserApiRequest $r): JsonResponse
    {
        $rv = $r->validated();
        $data = [];

        Log::info('[USER_API] search user params : ' . json_encode($rv));

        $data = $this->search(
            $rv['search'] ?? null,
            $rv['order_by'] ?? null,
            $rv['search_by'] ?? null,
            $rv['order_direction'] ?? null
        );

        return $this->responseHelper->success(
            $this->getRequestId(),
            'Successfully Get List User',
            ResponseCode::SUCCESS_GET_DATA,
            UserApiDto::fromUserApiCollection($data)
        );
    }

    private function search(
        string $search = null,
        string $orderBy = null,
        string $searchBy = null,
        string $orderDirection = null
    ) {
        $query = UserApi::where('user_id', $this->getUserId())
            ->with(['address', 'image']);

        if (!is_null($search) && !empty($search) && !is_null($searchBy) && !empty($searchBy)) {
            $query = $query->where($searchBy, 'like', '%' . $search . '%');
        }

        if (!is_null($orderBy) && !empty($orderBy) && !is_null($orderDirection) && !empty($orderDirection)) {
            $query = $query->orderBy($orderBy, $orderDirection);
        }

        return $query->get();
    }

    public function create(CreateUserApiRequest $r): JsonResponse
    {
        $rv = $r->validated();
        DB::transaction(function () use ($rv) {
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
                'filename' => basename($img)
            ]);
        });

        return $this->responseHelper->resourceNotFound('blm dibuat');
    }

    private function createDefaultImage(string $name): string
    {
        $dirUser = '/api/user/' . $this->getUserId() . '/img/';
        $path = Storage::disk('local')->path($dirUser);
        Storage::disk('local')->makeDirectory($dirUser);

        $finalPath = $path . '/' . Str::uuid()->toString();
        $avatar = new Avatar();
        $avatar->create($name)
            ->setDimension(400, 400)
            ->setFontSize(200)
            ->save($finalPath);

        return $finalPath;
    }


    public function getImage(string $id)
    {
        // TODO: Implement
    }
    public function updateImage(string $id)
    {
        // TODO: Implement
    }
    public function detail(string $id): JsonResponse
    {
        $user = UserApi::findOrFail($id);
        if ($user->user_id != $this->getUserId()) {
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
