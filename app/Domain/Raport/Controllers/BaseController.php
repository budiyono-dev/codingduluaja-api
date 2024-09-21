<?php

namespace App\Domain\Raport\Controllers;

class BaseController
{
    public function __construct()
    {
        //
    }

    protected function getMenu(string role){
        $menus = [
            [
                'name'=>'Master Data'
                'id'=> 1,
                'order'=> 1,
                'items'=>[
                    [
                        'id'=>1,
                        'name'=>'Siswa',
                        'route'=>'domain.raport.siswa.index',
                    ],
                    [
                        'id'=>2,
                        'name'=> 'Guru',
                        'route'=> 'domain.raport.guru.index',
                    ]
                ]
            ],
            [
                'name'=>'Nilai'
                'id'=> 2,
                'order'=> 2,
                'items'=>[
                    [
                        'id'=>3,
                        'name'=>'Ulangan',
                        'route'=>'domain.raport.siswa.index',
                    ],
                    [
                        'id'=>2,
                        'name'=> 'UAS',
                        'route'=> 'domain.raport.guru.index',
                    ],
                    [
                        'id'=>2,
                        'name'=> 'UTS',
                        'route'=> 'domain.raport.guru.index',
                    ],
                    [
                        'id'=>2,
                        'name'=> 'Praktikum',
                        'route'=> 'domain.raport.guru.index',
                    ]
                ]
            ],
            [
                'name'=>'Raport'
                'id'=> 3,
                'order'=> 3,
                'items'=>[
                    [
                        'id'=>3,
                        'name'=>'Lihat Raport',
                        'route'=>'domain.raport.siswa.index',
                    ],
                    [
                        'id'=>2,
                        'name'=> 'Generate Raport',
                        'route'=> 'domain.raport.guru.index',
                    ],
                    [
                        'id'=>2,
                        'name'=> 'UTS',
                        'route'=> 'domain.raport.guru.index',
                    ]
                ]
            ]
        ];
    }
}
