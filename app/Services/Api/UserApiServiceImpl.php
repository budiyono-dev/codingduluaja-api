<?php

namespace App\Services\Api;

use App\Dto\UserApiDto;
use App\Exceptions\ApiException;
use App\Helper\ConfigUtils;
use App\Helper\ImagePlaceholder;
use App\Helper\StringUtil;
use App\Models\Api\User\UserApi;
use App\Models\Api\User\UserApiImage;
use Faker\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class UserApiServiceImpl implements UserApiService
{
    public function __construct(
        protected ConfigUtils $configUtils,
    ) {}

    public function getView(int $userId)
    {
        return UserApi::where('user_id', $userId)->with(['address', 'image'])->get()
            ->map(function ($u) {
                return UserApiDto::fromUserApiFormatedDate($u, 'd-m-Y H:i:s');
            });
    }

    public function dummy(int $userId, int $qty)
    {
        DB::transaction(function () use ($userId, $qty) {
            $faker = Factory::create('id_ID');
            $dirUser = '/api/user/'.$userId.'/img';
            $path = Storage::disk('local')->path($dirUser);
            Storage::disk('local')->makeDirectory($dirUser);

            for ($i = 0; $i < $qty; $i++) {
                $user = UserApi::create([
                    'user_id' => $userId,
                    'name' => $faker->firstName().' '.$faker->lastName(),
                    'nik' => $faker->nik(),
                    'phone' => $faker->e164PhoneNumber(),
                    'email' => $faker->safeEmail(),
                ]);
                $user->address()->create([
                    'user_api_id' => $user->id,
                    'country' => $faker->country(),
                    'state' => $faker->state(),
                    'city' => $faker->city(),
                    'postcode' => $faker->postcode(),
                    'detail' => $faker->address(),
                ]);

                $img = $faker->image($path);
                $filename = basename($img);

                // UserApiImage::create([
                //     'user_api_id' => $user->id,
                //     'path' => $dirUser,
                //     'filename' => $filename,
                // ]);
                $user->image()->create([
                    'user_api_id' => $user->id,
                    'path' => $dirUser,
                    'filename' => $filename,
                ]);
            }
        });
    }

    public function get(int $userId, array $params)
    {
        return $this->search(
            $userId,
            $params['search'] ?? null,
            $params['order_by'] ?? 'created_at',
            $params['search_by'] ?? 'name',
            $params['order_direction'] ?? 'desc',
            $params['page_size'] ?? $this->configUtils->getPageSize()
        );
    }

    private function search(int $userId, ?string $search, string $orderBy, string $searchBy, string $orderDirection, int $pageSize)
    {
        $query = UserApi::where('user_id', $userId)
            ->with(['address', 'image']);

        if (! is_null($search) && ! empty($search) && ! is_null($searchBy) && ! empty($searchBy)) {
            $query = $query->where($searchBy, 'like', '%'.$search.'%');
        }

        if (! is_null($orderBy) && ! empty($orderBy) && ! is_null($orderDirection) && ! empty($orderDirection)) {
            $query = $query->orderBy($orderBy, $orderDirection);
        }

        return $query->simplePaginate($pageSize)
            ->through(function ($u) {
                return UserApiDto::fromUserApi($u);
            });
    }

    public function create(int $userId, array $req)
    {
        $user = null;
        DB::transaction(function () use ($req, $userId, $user) {
            $user = UserApi::create([
                'user_id' => $userId,
                'name' => $req['name'] ?? null,
                'nik' => $req['nik'] ?? null,
                'phone' => $req['phone'] ?? null,
                'email' => $req['email'] ?? null,
            ]);
            $user->address()->create([
                // 'user_api_id' => $user->id,
                'country' => $req['address']['country'] ?? null,
                'state' => $req['address']['state'] ?? null,
                'city' => $req['address']['city'] ?? null,
                'postcode' => $req['address']['postcode'] ?? null,
                'detail' => $req['address']['detail'] ?? null,
            ]);

            $img = $this->createDefaultImage($user->id, $user->name);
            $user->image()->create($img);
        });

        return $user;
    }

    private function createDefaultImage(string $userId, string $name)
    {
        Log::info('[userApi.SERVICE] creating default image');
        $dirUser = implode(DIRECTORY_SEPARATOR, ['api', 'user', $userId, 'img']);
        $path = Storage::disk('local')->path($dirUser);

        Log::info("[userApi.SERVICE] check directory exists: {$path}");
        if (! File::isDirectory($path)) {
            Storage::disk('local')->makeDirectory($dirUser);
        }
        if (! File::isWritable($path)) {
            Log::error("[userApi.SERVICE] cannot write to path: {$path}");
            throw ApiException::systemError();
        }

        $filename = StringUtil::uuidWihoutStrip().'.png';
        ImagePlaceholder::placeholderByName($name, $path, $filename);

        return [
            // 'user_api_id' => $userId,
            'path' => $dirUser,
            'filename' => $filename];
    }

    public function getImage(int $userId, string $id)
    {
        Log::info('[userApi.SERVICE] getImage of user '.$id);
        $u = UserApi::where('user_id', $userId)->where('id', $id)->firstOrFail();
        $rootPath = Storage::disk('local')->path('');

        $imgId = $u->image->id ?? null;
        if (is_null($imgId)) {
            throw ApiException::notFound();
        }

        $fp = $rootPath.$u->image->path.DIRECTORY_SEPARATOR.$u->image->filename;

        return response()->file($fp, ['Content-Type' => 'image/png']);
    }

    public function updateImage(int $userId, string $id, $file)
    {
        $u = UserApi::where('user_id', $userId)->where('id', $id)->firstOrFail();
        $imgPath = implode(DIRECTORY_SEPARATOR, ['api', 'user', $userId, 'img']);
        $filename = StringUtil::uuidWihoutStrip().'_'.$file->getClientOriginalName();

        $file->storeAs($imgPath, $filename);

        $img = $u->image;
        $img->filename = $filename;
        $img->save();

        $img->filename = StringUtil::removeUuidPrefix($filename);

        return $img;
    }

    public function detail(int $userId, string $id)
    {
        Log::info('[USER_API] get detail of user '.$id);
        $user = UserApi::where('id', $id)->where('user_id', $userId);

        return UserApiDto::fromUserApi($user);
    }

    public function edit(int $userId, int $id, $rv)
    {
        Log::info("[USER_API] Edit User {$id}");
        $user = UserApi::where('id', $id)->where('user_id', $userId);
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

        return UserApiDto::fromUserApi($user);
    }

    public function delete(int $userId, string $id)
    {
        Log::info('[USER_API] delete user '.$id);
        $user = UserApi::where('id', $id)->where('user_id', $userId);

        DB::transaction(function () use ($user) {
            $user->address->delete();
            $user->image->delete();
            $user->delete();
        });
    }
}
