<?php

return [
    'getAll' => <<<'EOD'
{
    "meta": {
        "request_id": "790feba7-c696-4e91-b4ee-e7d175e6b5ba",
        "success": true,
        "code": "CDA-S-001",
        "message": "Successfully Get Todolist"
    },
    "data": [
        {
            "id": "1",
            "date": "2024-08-15",
            "name": "Voluptatem dolorum in id.",
            "description": "Eum ad voluptatibus perferendis et possimus quidem dolor omnis iste et.",
            "created_at": "2024-08-09 16:06:24",
            "updated_at": "2024-08-09 16:06:24"
        },
        {
            "id": "2",
            "date": "2024-08-23",
            "name": "Tempora ut magni quia.",
            "description": "Voluptatem voluptas ab delectus sunt dolor dolores sed aut beatae ut dolor explicabo.",
            "created_at": "2024-08-09 16:06:24",
            "updated_at": "2024-08-09 16:06:24"
        },
        {
            "id": "3",
            "date": "2024-08-20",
            "name": "Sapiente doloremque praesentium.",
            "description": "Dolore amet et temporibus quisquam amet nesciunt qui.",
            "created_at": "2024-08-09 16:06:24",
            "updated_at": "2024-08-09 16:06:24"
        },
        {
            "id": "20",
            "date": "2024-08-15",
            "name": "Velit laudantium laudantium.",
            "description": "Neque eius maiores id perspiciatis quis aspernatur quam vel laborum ut.",
            "created_at": "2024-08-09 16:06:24",
            "updated_at": "2024-08-09 16:06:24"
        }
    ]
}
EOD,
    'detail' => <<<'EOD'
{
    "meta": {
        "request_id": "6fa0dfd0-cb08-4184-ae33-376efa34c616",
        "success": true,
        "code": "CDA-S-001",
        "message": "Successfully Get Todolist"
    },
    "data": {
        "id": "1",
        "date": "2024-08-15",
        "name": "Voluptatem dolorum in id.",
        "description": "Eum ad voluptatibus perferendis et possimus quidem dolor omnis iste et.",
        "created_at": "2024-08-09 16:06:24",
        "updated_at": "2024-08-09 16:06:24"
    }
}
EOD,
    'resCreate' => <<<'EOD'
{
    "meta": {
        "request_id": "ff325861-deb3-47ae-aea1-fc299c6bc7b9",
        "success": true,
        "code": "CDA-S-001",
        "message": "Data Inserted Successfully"
    },
    "data": null
}'
EOD,

    'reqCreate' => <<<'EOD'
{
    "date": "24-12-2023",
    "name": "watching tv",
    "description": "watching naruto"
}
EOD,
    'resEdit' => <<<'EOD'
{
    "meta": {
        "request_id": "afee1673-e721-48ee-b6da-418c2d64201d",
        "success": true,
        "code": "CDA-S-002",
        "message": "Data Updated Successfully"
    },
    "data": null
}
EOD,
    'reqEdit' => <<<'EOD'
{
    "date": "24-12-2023",
    "name": "watching football",
    "description": "MU VS Liverpol"
}
EOD,
    'resDelete' => <<<'EOD'
{
    "meta": {
        "request_id": "5504d11a-89f8-4cd8-b718-5e02538c5add",
        "success": true,
        "code": "CDA-S-003",
        "message": "Data Deleted Successfully"
    },
    "data": null
}
EOD,
    'resNotValid' => <<<'EOD'
{
    "meta": {
        "request_id": "f7688857-52ba-4f61-ab56-b8c33671911e",
        "success": false,
        "code": "CDA-V-001",
        "message": "Validation Error"
    },
    "data": [
        "The date field must be a date after or equal to 30-12-2023."
    ]
}
EOD,
];
