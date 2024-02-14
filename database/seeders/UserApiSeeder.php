<?php

namespace Database\Seeders;

use App\Helper\ConfigUtils;
use App\Models\Api\User\AddressUserApi;
use App\Models\Api\User\UserApi;
use App\Models\Api\User\UserApiAddress;
use App\Models\Api\User\UserApiImage;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserApiSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {
            $qty = ConfigUtils::getSeederUserApiQty();
            $u = User::where('email', 'tester@codingduluaja.online')->first();
            $faker = Factory::create('id_ID');
            $dirUser = '/api/user/' . $u->id . '/img';
            $path = Storage::disk('local')->path($dirUser);
            Storage::disk('local')->makeDirectory($dirUser);

            for ($i = 0; $i < $qty; $i++) {
                $user = UserApi::create([
                    'user_id' => $u->id,
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
        });
    }
}
