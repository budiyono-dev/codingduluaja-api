<?php

namespace App\Dto;

use App\Models\Api\User\UserApi;

class UserApiDto
{
    public function __construct(
        public string $id,
        public string $name,
        public string $nik,
        public string $phone,
        public string $email,
        public string $created_at,
        public string $updated_at,
        public UserApiDtoAddress $address,
        public UserApiDtoImage $image
    ) {}

    public static function fromUserApiCollection($users)
    {
        $data = [];
        foreach ($users as $u) {
            $data[] = UserApiDto::fromUserApi($u);
        }

        return $data;
    }

    public static function fromUserApi(UserApi $user): UserApiDto
    {
        $userAddr = $user->address;
        $userImg = $user->image;

        $addr = new UserApiDtoAddress(
            $userAddr->country,
            $userAddr->state,
            $userAddr->city,
            $userAddr->postcode,
            $userAddr->detail
        );
        $img = new UserApiDtoImage($userImg->filename);

        return new UserApiDto(
            $user->id,
            $user->name,
            $user->nik,
            $user->phone,
            $user->email,
            $user->created_at,
            $user->updated_at,
            $addr,
            $img
        );
    }

    public static function fromUserApiFormatedDate(UserApi $user, string $format): UserApiDto
    {
        $u = UserApiDto::fromUserApi($user);
        $u->created_at = $user->created_at->format($format);
        $u->updated_at = $user->created_at->format($format);

        return $u;
    }

    public static function toView(UserApi $user, string $format = 'd-m-Y H:i:s')
    {
        return (object) [
            'id' => $user->id,
            'name' => $user->name,
            'nik' => $user->nik,
            'phone' => $user->phone,
            'email' => $user->email,
            'created_at' => $user->created_at->format($format),
            'updated_at' => $user->updated_at->format($format),
        ];
    }
}

class UserApiDtoAddress
{
    public function __construct(
        public string $country,
        public string $state,
        public string $city,
        public string $postcode,
        public string $detail
    ) {}
}

class UserApiDtoImage
{
    public function __construct(
        public string $filename
    ) {}
}
