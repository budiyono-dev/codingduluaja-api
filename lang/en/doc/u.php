<?php

return [
    'list' => <<<'EOD'
{
    "meta": {
        "request_id": "5bdb76b8-c963-4c7c-b3f8-1ae906bf499b",
        "success": true,
        "code": "CDA-S-001",
        "message": "Successfully Get List User"
    },
    "data": {
        "current_page": 1,
        "data": [
            {
                "id": "2",
                "name": "Wawan Hidayanto",
                "nik": "5205772812129265",
                "phone": "+3750678934910",
                "email": "pkusumo@example.net",
                "created_at": "2024-03-04 13:05:22",
                "updated_at": "2024-03-04 13:05:22",
                "address": {
                    "country": "Kaledonia baru",
                    "state": "Sulawesi Tenggara",
                    "city": "Pematangsiantar",
                    "postcode": "24480",
                    "detail": "Ds. Elang No. 610, Surabaya 27560, Bali"
                },
                "image": {
                    "filename": "67da6561816031e074ec4a5d70e5190d.png"
                }
            }
        ],
        "first_page_url": "http://localhost:8000/api/user?page=1",
        "from": 1,
        "next_page_url": null,
        "path": "http://localhost:8000/api/user",
        "per_page": 5,
        "prev_page_url": null,
        "to": 1
    }
}
EOD,
    'create' => <<<'EOD'
{
    "meta": {
        "request_id": "5d59ed57-c5b8-4f9b-85b4-8f0842e6e3a8",
        "success": true,
        "code": "CDA-S-006",
        "message": "User created successfully"
    },
    "data": null
}
EOD,
    'reqCreate' => <<<'EOD'
{
    "name": "andrew",
    "nik": "1234567890987654",
    "phone": "089876543245",
    "email": "andrew@example.org",
    "address": {
        "country": "Indonesia",
        "state": "Jawa Tengah",
        "city": "Magelang",
        "postcode": "76356",
        "detail": "Jl. jenderal soedirman 123"
    }
}
EOD,
    'detail' => <<<'EOD'
{
    "meta": {
        "request_id": "90615976-49f9-44e1-8181-9005976457a0",
        "success": true,
        "code": "CDA-S-001",
        "message": "Successfully Get User"
    },
    "data": {
        "id": "1",
        "name": "Ikin Hardiansyah",
        "nik": "1101251711130951",
        "phone": "+67527354693",
        "email": "darmaji.hariyah@example.org",
        "created_at": "2024-03-04 13:05:20",
        "updated_at": "2024-03-04 13:05:20",
        "address": {
            "country": "Iran",
            "state": "Papua",
            "city": "Ternate",
            "postcode": "29504",
            "detail": "Ki. Baha No. 661, Bau-Bau 67119, Kalteng"
        },
        "image": {
            "filename": "3adba9aa19296b71292082a5a13615b7.png"
        }
    }
}
EOD,
    'update' => <<<'EOD'
{
    "meta": {
        "request_id": "a05009c9-2558-4734-ba41-e341f9fa2017",
        "success": true,
        "code": "CDA-S-002",
        "message": "Data Updated Successfully"
    },
    "data": null
}
EOD,
    'reqUpdate' => <<<'EOD'
{
    "name": "andrew",
    "nik": "1234567890987654",
    "phone": "089876543245",
    "email": "andrew@example.org",
    "address": {
        "country": "Indonesia",
        "state": "Jawa Tengah",
        "city": "Magelang",
        "postcode": "76356",
        "detail": "Jl. jenderal soedirman 123"
    }
}
EOD,
    'delete' => <<<'EOD'
{
    "meta": {
        "request_id": "939bdcee-d392-4687-94fd-4c9b2d746243",
        "success": true,
        "code": "CDA-S-003",
        "message": "Successfully Delete User"
    },
    "data": null
}
EOD,
    'updateImage' => <<<'EOD'
{
    "meta": {
        "request_id": "a05009c9-2558-4734-ba41-e341f9fa2017",
        "success": true,
        "code": "CDA-S-002",
        "message": "Image Updated Successfully"
    },
    "data": null
}
EOD
];
