<?php

namespace App\Http\Controllers\Api;

use App\Dto\UserApiDto;
use App\Models\Api\User\UserApiAddress;
use App\Models\Api\User\UserApiImage;
use App\Traits\ApiContext;
use App\Models\Api\User\UserApi;
use App\Constants\ResponseCode;
use App\Enums\MasterResourceType;
use App\Exceptions\ApiException;
use App\Helper\ConfigUtils;
use App\Helper\ImagePlaceholder;
use App\Helper\ResponseHelper;
use App\Helper\StringUtil;
use App\Http\Requests\Api\User\CreateDummyUserRequest;
use App\Http\Requests\Api\User\CreateUserApiRequest;
use App\Http\Requests\Api\User\SearchUserApiRequest;
use App\Http\Requests\Api\User\UploadImageUserApiRequest;
use App\Services\ResourceService;
use Faker\Factory;
use Illuminate\Routing\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class UserApiController extends Controller
{
    use ApiContext;

    public function __construct(
        protected ResponseHelper $responseHelper,
        protected ConfigUtils $configUtils,
        protected ImagePlaceholder $imagePlaceholder,
        protected ResourceService $resourceService
    ) {
    }

    public function index()
    {
        $data = UserApi::where('user_id', Auth::user()->id)->get()
            ->map(function ($u) {
                return UserApiDto::fromUserApiFormatedDate($u, 'd-m-Y H:i:s');
            });

        return view('page.res.user-api', [
            'title' => 'User API',
            'user' => $data
        ]);
    }

    public function dummy(CreateDummyUserRequest $r)
    {
        $rv = $r->validated();

        if ($this->resourceService->isConnectedResource(MasterResourceType::USER_API)) {
            abort(403);
        }
        
        $qty = $rv['sel_qty'];
        $userId = Auth::user()->id;

        $faker = Factory::create('id_ID');
        $dirUser = '/api/user/' . $userId . '/img';
        $path = Storage::disk('local')->path($dirUser);
        Storage::disk('local')->makeDirectory($dirUser);

        for ($i = 0; $i < $qty; $i++) {
            $user = UserApi::create([
                'user_id' => $userId,
                'name' => $faker->firstName() . ' ' . $faker->lastName(),
                'nik' => $faker->nik(),
                'phone' => $faker->e164PhoneNumber(),
                'email' => $faker->safeEmail()
            ]);

            UserApiAddress::create([
                'user_api_id' => $user->id,
                'country' => $faker->country(),
                'state' => $faker->state(),
                'city' => $faker->city(),
                'postcode' => $faker->postcode(),
                'detail' => $faker->address(),
            ]);

            $img = $faker->image($path);
            $filename = basename($img);

            UserApiImage::create([
                'user_api_id' => $user->id,
                'path' => $dirUser,
                'filename' => $filename
            ]);
        }
        return redirect()->route('page.res.userApi');
    }

    public function get(SearchUserApiRequest $r): JsonResponse
    {
        $rv = $r->validated();
        $data = [];

        Log::info('[USER_API] search user params : ' . json_encode($rv));

        $data = $this->search(
            $rv['search'] ?? null,
            $rv['order_by'] ?? 'created_at',
            $rv['search_by'] ?? 'name',
            $rv['order_direction'] ?? 'desc',
            $rv['page_size'] ?? $this->configUtils->getPageSize()
        );

        return $this->responseHelper->success(
            $this->getRequestId(),
            'Successfully Get List User',
            ResponseCode::SUCCESS_GET_DATA,
            $data
        );
    }

    private function search(?string $search, string $orderBy, string $searchBy, string $orderDirection, int $pageSize)
    {
        $query = UserApi::where('user_id', $this->getUserId())
            ->with(['address', 'image']);

        if (!is_null($search) && !empty($search) && !is_null($searchBy) && !empty($searchBy)) {
            $query = $query->where($searchBy, 'like', '%' . $search . '%');
        }

        if (!is_null($orderBy) && !empty($orderBy) && !is_null($orderDirection) && !empty($orderDirection)) {
            $query = $query->orderBy($orderBy, $orderDirection);
        }

        return $query->simplePaginate($pageSize)
            ->through(function ($u) {
                return UserApiDto::fromUserApi($u);
            });
    }

    public function create(CreateUserApiRequest $r): JsonResponse
    {
        $rv = $r->validated();
        DB::transaction(function () use ($rv) {
            $user = UserApi::create([
                'user_id' => $this->getUserId(),
                'name' => $rv['name'] ?? null,
                'nik' => $rv['nik'] ?? null,
                'phone' => $rv['phone'] ?? null,
                'email' => $rv['email'] ?? null
            ]);
            UserApiAddress::create([
                'user_api_id' => $user->id,
                'country' => $rv['address']['country'] ?? null,
                'state' => $rv['address']['state'] ?? null,
                'city' => $rv['address']['city'] ?? null,
                'postcode' => $rv['address']['postcode'] ?? null,
                'detail' => $rv['address']['detail'] ?? null
            ]);

            $img = $this->createDefaultImage($user->id, $user->name);
            $img->save();
        });

        return $this->responseHelper->success(
            $this->getRequestId(),
            'User created successfully',
            ResponseCode::SUCCESS_CREATE_DATA,
            null
        );
    }

    private function createDefaultImage(string $userId, string $name): UserApiImage
    {
        Log::info("[USER_API] {$this->getRequestId()} creating default image");
        $dirUser = implode(DIRECTORY_SEPARATOR, ['api', 'user', $this->getUserId(), 'img']);
        $path = Storage::disk('local')->path($dirUser);

        Log::info("[USER_API] check directory exists: {$path}");
        if (!File::isDirectory($path)) {
            Storage::disk('local')->makeDirectory($dirUser);
        }
        if (!File::isWritable($path)) {
            Log::error("[USER_API] cannot write to path: {$path}");
            throw ApiException::systemError();
        }

        $filename = StringUtil::uuidWihoutStrip() . '.png';
        $this->imagePlaceholder->placeholderByName($name, $path, $filename);
        
        $img = new UserApiImage();
        $img->user_api_id = $userId;
        $img->path = $dirUser;
        $img->filename = $filename;
        return $img;
    }


    public function getImage(string $id)
    {
        Log::info('[USER_API] getImage of user ' . $id);
        $u = UserApi::where('user_id', $this->getUserId())->where('id', $id)->firstOrFail();
        $rootPath = Storage::disk('local')->path('');

        $imgId = $u->image->id ?? null;
        if (is_null($imgId)) {
            return $this->responseHelper
                ->notFound($this->getRequestId(), "Image not found", ResponseCode::RESOURCE_NOT_FOUND);
        }

        $fp = $rootPath . $u->image->path . DIRECTORY_SEPARATOR . $u->image->filename;
        return response()->file($fp, ['Content-Type' => 'image/png']);
    }

    public function updateImage(string $id, UploadImageUserApiRequest $r)
    {
        $rv = $r->validated();
        $file = $rv['file'];

        $u = UserApi::where('user_id', $this->getUserId())->where('id', $id)->firstOrFail();
        $imgPath = implode(DIRECTORY_SEPARATOR, ['api', 'user', $this->getUserId(), 'img']);
        $filename = StringUtil::uuidWihoutStrip() . '_' . $file->getClientOriginalName();

        $file->storeAs($imgPath, $filename);

        $img = $u->image;
        $img->filename = $filename;
        $img->save();

        $img->filename = StringUtil::removeUuidPrefix($filename);

        return $this->responseHelper->success(
            $this->getRequestId(),
            'Image Updated Successfully',
            ResponseCode::SUCCESS_EDIT_DATA,
            null
        );
    }

    public function detail(string $id): JsonResponse
    {
        Log::info('[USER_API] get detail of user ' . $id);
        $user = UserApi::findOrFail($id);
        if ($user->user_id != $this->getUserId()) {
            return $this->responseHelper->notFound($this->getRequestId(), 'user', ResponseCode::MODEL_NOT_FOUND);
        }
        return $this->responseHelper->success(
            $this->getRequestId(),
            'Successfully Get User',
            ResponseCode::SUCCESS_GET_DATA,
            UserApiDto::fromUserApi($user)
        );
    }

    public function edit(int $id, CreateUserApiRequest $r): JsonResponse
    {
        Log::info("[USER_API] Edit User {$id}");
        $rv = $r->validated();
        $user = UserApi::findOrFail($id);
        DB::transaction(function () use ($rv, $user) {
            $user->name = $rv['name'] ?? null;
            $user->nik = $rv['nik'] ?? null;
            $user->phone = $rv['phone'] ?? null;
            $user->email = $rv['email'] ?? null;

            $user->save();

            $address = $user->address;
            $address->country = $rv['address']['country'] ?? null;
            $address->state = $rv['address']['state'] ?? null;
            $address->city = $rv['address']['city'] ?? null;
            $address->postcode = $rv['address']['postcode'] ?? null;
            $address->detail = $rv['address']['detail'] ?? null;

            $address->save();
        });

        return $this->responseHelper->success(
            $this->getRequestId(),
            'Data Updated Successfully',
            ResponseCode::SUCCESS_EDIT_DATA,
            null
        );
    }

    public function delete(string $id): JsonResponse
    {
        Log::info('[USER_API] delete user ' . $id);
        $user = UserApi::findOrFail($id);
        if ($user->user_id != $this->getUserId()) {
            return $this->responseHelper->notFound($this->getRequestId(), 'user', ResponseCode::MODEL_NOT_FOUND);
        }
        DB::transaction(function () use ($user) {
            $user->address->delete();
            $user->image->delete();
            $user->delete();
        });
        return $this->responseHelper->success(
            $this->getRequestId(),
            'Successfully Delete User',
            ResponseCode::SUCCESS_DELETE_DATA,
            null
        );
    }
}
