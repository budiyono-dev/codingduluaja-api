<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DevelopmentSeeeder extends Seeder
{
    public function run(): void
    {
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
            insert into `master_resource` (`id`, `name`, `created_at`, `updated_at`)
            values
            ('2','Mahasiswa',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            ('3','Wilayah',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            ('4','API',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP)
            ");
        DB::insert("
            INSERT INTO `client_resource` 
            VALUES 
            (1,1,1,'2023-10-02 06:32:22','2023-10-02 06:32:22'),
            (2,1,2,'2023-10-02 06:32:27','2023-10-02 06:32:27'),
            (3,1,3,'2023-10-02 06:32:33','2023-10-02 06:32:33'),
            (4,1,4,'2023-10-02 06:32:38','2023-10-02 06:32:38');
            ");
        DB::insert("
            INSERT INTO `connected_app` 
            VALUES 
            (1,1,1,'2023-10-02 06:33:05','2023-10-02 06:33:05'),
            (2,2,2,'2023-10-02 06:33:13','2023-10-02 06:33:13'),
            (3,1,4,'2023-10-02 06:33:19','2023-10-02 06:33:19'),
            (4,3,4,'2023-10-02 06:33:27','2023-10-02 06:33:27'),
            (5,3,5,'2023-10-02 06:33:39','2023-10-02 06:33:39'),
            (6,4,6,'2023-10-02 06:33:52','2023-10-02 06:33:52'),
            (7,4,5,'2023-10-02 06:34:02','2023-10-02 06:34:02'),
            (8,1,2,'2023-10-02 06:34:17','2023-10-02 06:34:17'),
            (9,4,3,'2023-10-02 06:34:28','2023-10-02 06:34:28');
            ");
    }
}
