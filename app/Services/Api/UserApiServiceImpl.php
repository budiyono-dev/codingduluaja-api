<?php

namespace App\Services\Api;

use App\Dto\TodolistDto;
use App\Exceptions\ApiException;
use App\Models\Api\Todolist;
use Carbon\Carbon;
use App\Constants\ResponseCode;
use App\Dto\UserApiDto;
use App\Enums\MasterResourceType;
use App\Helper\ConfigUtils;
use App\Helper\ImagePlaceholder;
use App\Helper\ResponseHelper;
use App\Helper\StringUtil;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\CreateDummyUserRequest;
use App\Http\Requests\Api\User\CreateUserApiRequest;
use App\Http\Requests\Api\User\SearchUserApiRequest;
use App\Http\Requests\Api\User\UploadImageUserApiRequest;
use App\Models\Api\User\UserApi;
use App\Models\Api\User\UserApiAddress;
use App\Models\Api\User\UserApiImage;
use App\Services\ResourceService;
use App\Traits\ApiContext;
use Faker\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Services\Api\UserApiService;

class UserApiServiceImpl implements UserApiService
{
    public function __construct()
    {
        //
    }

    public function getView(int $userId)
    {
        return UserApi::where('user_id', Auth::user()->id)->get()
            ->map(function ($u) {
                return UserApiDto::fromUserApiFormatedDate($u, 'd-m-Y H:i:s');
            });
    }
}
