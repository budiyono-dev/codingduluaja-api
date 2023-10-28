<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DevelopmentSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {
            DB::insert("
                insert into `client_app` (`user_id`, `name`, `app_key`, `created_at`, `updated_at`)
                values 
                ('1','pakan ikan','7ceb4fa11dba48ff84b5098c38b9deb7',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
                ('1','kebun','8774a85a16074806acb7a6149f8c98c9',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
                ('1','kopi shop','5ee5c4fef5e3451e8616d39ca985aadf',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
                ('1','react app','d4caabc3ad604b809e8655fe2a043670',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
                ('1','pos web','8b6997d6e06a46bba128ecdcb4d8e48d',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
                ('1','testing','e49e34a5f09d49fe9add396ff75a5e9c',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP)
                ");
            DB::insert("
                insert into `master_resource` (`id`, `name`, `path`, `created_at`, `updated_at`)
                values
                ('2','Mahasiswa','/mahasiswa', CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
                ('3','Wilayah','/wilayah', CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
                ('4','users','/users', CURRENT_TIMESTAMP,CURRENT_TIMESTAMP)
                ");
            DB::insert("
                INSERT INTO `client_resource` (user_id, master_resource_id, created_at, updated_at)
                VALUES 
                (1,1,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
                (1,2,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
                (1,3,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
                (1,4,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
                ");
            DB::insert("
                INSERT INTO `connected_app` (client_resource_id, client_app_id, created_at, updated_at)
                VALUES 
                (1,1,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
                (2,2,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
                (1,4,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
                (3,4,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
                (3,5,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
                (4,6,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
                (4,5,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
                (1,2,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
                (4,3,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
                ");
        });
    }
}
