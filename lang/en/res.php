<?php

return [
    'todolist' => [
        'resGetAll' => '{"meta":{"request_id":"94082663-416b-48cf-adc8-2779a8c10362","success":true,"code":"CDA-S-001","message":"Successfully Get Todolist"},"data":[{"id":"1","date":"2023-12-31","name":"Rerum autem distinctio.","description":"Est vero eligendi reiciendis corporis cupiditate voluptas et.","created_at":"2023-12-21 08:28:30","updated_at":"2023-12-21 08:28:30"},{"id":"2","date":"2023-12-28","name":"Sed ab aut.","description":"Magnam et velit delectus exercitationem qui quia est qui excepturi est harum.","created_at":"2023-12-21 08:28:30","updated_at":"2023-12-21 08:28:30"}]}',
        'resGetSingle' => '{"meta":{"request_id":"5504d11a-89f8-4cd8-b718-5e02538c5add","success":true,"code":"CDA-S-003","message":"Data Deleted Successfully"},"data":null}',
        'resCreate' => '{"meta":{"request_id":"ff325861-deb3-47ae-aea1-fc299c6bc7b9","success":true,"code":"CDA-S-001","message":"Data Inserted Successfully"},"data":null}',
        'reqCreate' => '{"date":"24-12-2023","name":"watching tv","description":"watching naruto"}',
        'resEdit' => '{"meta":{"request_id":"afee1673-e721-48ee-b6da-418c2d64201d","success":true,"code":"CDA-S-002","message":"Data Updated Successfully"},"data":null}',
        'reqEdit' => '{"date":"24-12-2023","name":"watching football","description":"MU VS Liverpol"}',
        'resDelete' => '{"meta":{"request_id":"5504d11a-89f8-4cd8-b718-5e02538c5add","success":true,"code":"CDA-S-003","message":"Data Deleted Successfully"},"data":null}',
        'resNotValid' => '{"meta":{"request_id":"f7688857-52ba-4f61-ab56-b8c33671911e","success":false,"code":"CDA-V-001","message":"Validation Error"},"data":["The date field must be a date after or equal to 30-12-2023."]}',
    ],
    'bps' => [
        'listProvinsi' => '{"meta":{"request_id":"09401522-b8db-4270-9f98-d4576feb8098","success":true,"code":"CDA-S-001","message":"Successfully Get List Provinsi"},"data":[{"id":1,"nama":"ACEH"},{"id":2,"nama":"SUMATERA UTARA"},{"id":3,"nama":"SUMATERA BARAT"}]}',
        'detailProvinsi' => '{"meta":{"request_id":"67044262-792c-4c39-8151-13bbe4b76036","success":true,"code":"CDA-S-001","message":"Successfully Get Provinsi"},"data":{"id":1,"kode":"11","nama":"ACEH"}}',
        'listKabupaten' => '{"meta":{"request_id":"42be490b-5b66-490c-9dda-d844c39af190","success":true,"code":"CDA-S-001","message":"Successfully Get List Kabupaten"},"data":[{"id":1,"nama":"SIMEULUE"},{"id":2,"nama":"ACEH SINGKIL"},{"id":3,"nama":"ACEH SELATAN"}]}',
        'detailKabupaten' => '{"meta":{"request_id":"ef9e336b-540a-44ce-8f24-e64c24b381a3","success":true,"code":"CDA-S-001","message":"Successfully Get Kabupaten"},"data":{"id":123,"kode":"1708","nama":"KEPAHIANG"}}',
        'listKecamatan' => '{"meta":{"request_id":"4e62347c-b94d-490a-b29d-09a7531ad244","success":true,"code":"CDA-S-001","message":"Successfully Get List Kecamatan"},"data":[{"id":3360,"nama":"MOJO"},{"id":3361,"nama":"SEMEN"},{"id":3362,"nama":"NGADILUWIH"}]}',
        'detailKecamatan' => '{"meta":{"request_id":"7d309f0e-cdb5-4bc6-9abd-e25e7639c4e4","success":true,"code":"CDA-S-001","message":"Successfully Get Kecamatan"},"data":{"id":2500,"kode":"3216121","nama":"SUKAKARYA"}}',
        'listDesa' => '{"meta":{"request_id":"3687757a-47d7-4f90-bb45-2fa2b9d1c645","success":true,"code":"CDA-S-001","message":"Successfully Get List Desa"},"data":[{"id":29940,"nama":"PUSAKARATU"},{"id":29941,"nama":"GEMPOL"},{"id":29942,"nama":"KALENTAMBO"}]}',
        'detailDesa' => '{"meta":{"request_id":"7ce19183-f879-4b68-b03b-0fb1adb0954e","success":true,"code":"CDA-S-001","message":"Successfully Get Desa"},"data":{"id":2500,"kode":"1108100066","nama":"BUKLOH"}}',
    ],
    'dagri' => [
        'listProvinsi' => '{"meta":{"request_id":"09401522-b8db-4270-9f98-d4576feb8098","success":true,"code":"CDA-S-001","message":"Successfully Get List Provinsi"},"data":[{"id":1,"nama":"ACEH"},{"id":2,"nama":"SUMATERA UTARA"},{"id":3,"nama":"SUMATERA BARAT"}]}',
        'detailProvinsi' => '{"meta":{"request_id":"0e99ab42-5e7b-4529-a689-759d57484356","success":true,"code":"CDA-S-001","message":"Successfully Get Provinsi"},"data":{"id":34,"kode":"91","nama":"PAPUA"}}',
        'listKabupaten' => '{"meta":{"request_id":"4fea5a6d-c37d-4b23-a58d-5d75e3b8f384","success":true,"code":"CDA-S-001","message":"Successfully Get List Kabupaten"},"data":[{"id":188,"nama":"KAB. CILACAP"},{"id":189,"nama":"KAB. BANYUMAS"},{"id":190,"nama":"KAB. PURBALINGGA"}]}',
        'detailKabupaten' => '{"meta":{"request_id":"2e32eb96-b28f-4c15-8029-b9d0afef3eea","success":true,"code":"CDA-S-001","message":"Successfully Get Kabupaten"},"data":{"id":190,"kode":"33.03","nama":"KAB. PURBALINGGA"}}',
        'listKecamatan' => '{"meta":{"request_id":"ac13d412-9077-43e6-85c2-392e963f8c01","success":true,"code":"CDA-S-001","message":"Successfully Get List Kecamatan"},"data":[{"id":2642,"nama":"LUMBIR"},{"id":2643,"nama":"WANGON"},{"id":2644,"nama":"JATILAWANG"}]}',
        'detailKecamatan' => '{"meta":{"request_id":"b9f2d920-e810-497e-9aa6-06f546e90fe3","success":true,"code":"CDA-S-001","message":"Successfully Get Kecamatan"},"data":{"id":2643,"kode":"33.02.02","nama":"WANGON"}}',
        'listDesa' => '{"meta":{"request_id":"bf49a868-30a6-4159-ac4e-edaa729b766e","success":true,"code":"CDA-S-001","message":"Successfully Get List Desa"},"data":[{"id":31713,"nama":"RANDEGAN"},{"id":31714,"nama":"RAWAHENG"},{"id":31715,"nama":"PENGADEGAN"}]}',
        'detailDesa' => '{"meta":{"request_id":"3260575f-868b-49f6-9589-cd72f4c37c89","success":true,"code":"CDA-S-001","message":"Successfully Get Desa"},"data":{"id":31723,"kode":"33.02.02.2010","nama":"WLAHAR"}}',
    ],
    'user' => [
        'list' => '{"meta":{"request_id":"5bdb76b8-c963-4c7c-b3f8-1ae906bf499b","success":true,"code":"CDA-S-001","message":"Successfully Get List User"},"data":{"current_page":1,"data":[{"id":"2","name":"Wawan Hidayanto","nik":"5205772812129265","phone":"+3750678934910","email":"pkusumo@example.net","created_at":"2024-03-04 13:05:22","updated_at":"2024-03-04 13:05:22","address":{"country":"Kaledonia baru","state":"Sulawesi Tenggara","city":"Pematangsiantar","postcode":"24480","detail":"Ds. Elang No. 610, Surabaya 27560, Bali"},"image":{"filename":"67da6561816031e074ec4a5d70e5190d.png"}}],"first_page_url":"http://localhost:8000/api/user?page=1","from":1,"next_page_url":null,"path":"http://localhost:8000/api/user","per_page":5,"prev_page_url":null,"to":1}}',
        'create' => '{"meta":{"request_id":"5d59ed57-c5b8-4f9b-85b4-8f0842e6e3a8","success":true,"code":"CDA-S-006","message":"User created successfully"},"data":null}',
        'reqCreate' => '{"name":"andrew","nik":"1234567890987654","phone":"089876543245","email":"andrew@example.org","address":{"country":"Indonesia","state":"Jawa Tengah","city":"Magelang","postcode":"76356","detail":"Jl. jenderal soedirman 123"}}',
        'detail' => '{"meta":{"request_id":"90615976-49f9-44e1-8181-9005976457a0","success":true,"code":"CDA-S-001","message":"Successfully Get User"},"data":{"id":"1","name":"Ikin Hardiansyah","nik":"1101251711130951","phone":"+67527354693","email":"darmaji.hariyah@example.org","created_at":"2024-03-04 13:05:20","updated_at":"2024-03-04 13:05:20","address":{"country":"Iran","state":"Papua","city":"Ternate","postcode":"29504","detail":"Ki. Baha No. 661, Bau-Bau 67119, Kalteng"},"image":{"filename":"3adba9aa19296b71292082a5a13615b7.png"}}}',
        'update' => '{"meta":{"request_id":"a05009c9-2558-4734-ba41-e341f9fa2017","success":true,"code":"CDA-S-002","message":"Data Updated Successfully"},"data":null}',
        'reqUpdate' => '{"name":"andrew","nik":"1234567890987654","phone":"089876543245","email":"andrew@example.org","address":{"country":"Indonesia","state":"Jawa Tengah","city":"Magelang","postcode":"76356","detail":"Jl. jenderal soedirman 123"}}',
        'delete' => '{"meta":{"request_id":"939bdcee-d392-4687-94fd-4c9b2d746243","success":true,"code":"CDA-S-003","message":"Successfully Delete User"},"data":null}',
        'updateImage' => '{"meta":{"request_id":"a05009c9-2558-4734-ba41-e341f9fa2017","success":true,"code":"CDA-S-002","message":"Image Updated Successfully"},"data":null}',
    ],
    'error' => [
        'unauthorized' => '{"meta":{"request_id":"6c6a5348-4571-456e-8063-957f9202cdbb","success":false,"code":"CDA-A-001","message":"Unauthorized"},"data":{"request":"Unauthorized request"}}',
        'notFound' => '{"meta":{"request_id":"6bf84d71-ce6f-429e-86b3-52f4db2e1309","success":false,"code":"CDA-E-001","message":"Data not found"},"data":null}',
    ],
];
