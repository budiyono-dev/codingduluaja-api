<x-layout.main-doc title="Documentation | User">
@markdown

# User Api
User Api merupakan api yang disediakan untuk menampilkan data dummy user.

## Endpoint
### Get All User

#### Spesification

| Specification |  |
| --- | --- |
| Description | Get All User |
| Method | GET |
| URL | `{{config('app.url')}}/api/user` |
| Security | Token |
| Request | `application/json` |
| Response | `application/json` |

#### Request Header

| Name | Value |
| --- | --- |
| Authorization | `@{{token}}` |
| Accept | `application/json` |

#### Request Param

| Name | Mandatory | Value |
| --- | --- | --- |
| search | N | text to search|
| order_by | N | ordering data by created_at (default), name or updated_at|
| search_by | N | searching by name (default), nik, phone or email|
| order_direction | N | ordering asc (ascending) or desc (descending)|
| page_size | N | page size (3,5,10, or 20)|

#### Example Response

```json
{
    "meta": {
        "request_id": "fa13f218-de57-4783-8d41-865c4963d7de",
        "success": true,
        "code": "CDA-S-001",
        "message": "Successfully Get List User"
    },
    "data": {
        "current_page": 1,
        "data": [
            {
                "id": "a38fe0ec-f3bd-48a4-b7a5-aa70ecdea2b8",
                "name": "Wakiman Wahyuni",
                "nik": "7309592205209097",
                "phone": "+40054706318",
                "email": "waluyo11@example.com",
                "created_at": "07-08-2024 16:02:54",
                "updated_at": "07-08-2024 16:02:54"
            },
            {
                "id": "d23505bb-3b64-4599-a0ce-3484dcd0ffd7",
                "name": "Lurhur Usamah",
                "nik": "3371494602037982",
                "phone": "+96574408802",
                "email": "zahra37@example.org",
                "created_at": "07-08-2024 16:02:54",
                "updated_at": "07-08-2024 16:02:54"
            },
            {
                "id": "bef8e144-a323-4cd3-bf23-8b8f99f0fb84",
                "name": "Dadi Padmasari",
                "nik": "1701180708081459",
                "phone": "+2631572010694",
                "email": "panca50@example.org",
                "created_at": "07-08-2024 16:02:54",
                "updated_at": "07-08-2024 16:02:54"
            },
            {
                "id": "9958f181-e5cb-4ad1-a518-bd5fc3a7f177",
                "name": "Tomi Januar",
                "nik": "6201840607102054",
                "phone": "+26654092727",
                "email": "harimurti43@example.org",
                "created_at": "07-08-2024 16:02:54",
                "updated_at": "07-08-2024 16:02:54"
            },
            {
                "id": "5fd5a3a4-68f5-4935-8ff0-92a88dffb58a",
                "name": "Alika Oktaviani",
                "nik": "3601492712027751",
                "phone": "+6737238507",
                "email": "cnamaga@example.net",
                "created_at": "07-08-2024 16:02:54",
                "updated_at": "07-08-2024 16:02:54"
            }
        ],
        "first_page_url": "http://localhost:8000/api/user?page=1",
        "from": 1,
        "next_page_url": null,
        "path": "http://localhost:8000/api/user",
        "per_page": 5,
        "prev_page_url": null,
        "to": 5
    }
}
```

### Get Detail User

#### Spesification

| Specification |  |
| --- | --- |
| Description | Get Detail User |
| Method | GET |
| URL | `{{config('app.url')}}/api/user/{id}` |
| Security | Token |
| Request | `application/json` |
| Response | `application/json` |

#### Request Header

| Name | Value |
| --- | --- |
| Authorization | `@{{token}}` |
| Accept | `application/json` |

#### Path Variable

| Name | Value |
| --- | --- |
| id | id user |

#### Example Response

```json
{
    "meta": {
        "request_id": "d1058b23-d3df-489a-b7a5-7fd49e9695b5",
        "success": true,
        "code": "CDA-S-001",
        "message": "Successfully Get User"
    },
    "data": {
        "id": "9958f181-e5cb-4ad1-a518-bd5fc3a7f177",
        "name": "Tomi Januar",
        "nik": "6201840607102054",
        "phone": "+26654092727",
        "email": "harimurti43@example.org",
        "created_at": "2024-08-07 16:02:54",
        "updated_at": "2024-08-07 16:02:54",
        "address": {
            "country": "Singapura",
            "state": "Maluku",
            "city": "Denpasar",
            "postcode": "40520",
            "detail": "Ds. Babadak No. 364, Padangsidempuan 46294, Kalteng"
        },
        "image": {
            "filename": "09dcbe0ce86c4702b088765276bf19e7.png"
        }
    }
}
```

### Create User

#### Spesification

| Specification |  |
| --- | --- |
| Description | Create User |
| Method | POST |
| URL | `{{config('app.url')}}/api/user` |
| Security | Token |
| Request | `application/json` |
| Response | `application/json` |

#### Request Header

| Name | Value |
| --- | --- |
| Authorization | `@{{token}}` |
| Accept | `application/json` |

#### Request Body

| Name | Mandatory | Value |
| --- | --- | --- |
| name | Y | name|
| nik | Y | 16 characters NIK|
| phone | N | phone number|
| email | Y | email address|
| country | N | country name|
| state | N | state name|
| city | N | city name|
| postcode | N | postal code|
| detail | N | detail address|

#### Example Request

```json
{
    "name": "Latika Mardhi",
    "nik": "1302910703153399",
    "phone": "996539651440",
    "email": "harsanto.wijaya@example.org",
    "address": {
        "country": "Indonesia",
        "state": "Sumatera Barat",
        "city": "Palopo",
        "postcode": "13332",
        "detail": "Kpg. Taman No. 393, Kendari 83824, Sumatra Barat",
    }
}
```

#### Example Response

```json
{
    "meta": {
        "request_id": "e93e10e7-2136-40c3-96b0-310e51b6cedb",
        "success": true,
        "code": "CDA-S-006",
        "message": "User created successfully"
    },
    "data": {
        "id": "9cbf337b-3339-4931-a325-d3813e069dc9",
        "name": "Latika Mardhi",
        "nik": "1302910703153399",
        "phone": "996539651440",
        "email": "harsanto.wijaya@example.org",
        "created_at": "2024-08-12 15:09:23",
        "updated_at": "2024-08-12 15:09:23",
        "address": {
            "country": "Indonesia",
            "state": "Sumatera Barat",
            "city": "Palopo",
            "postcode": "13332",
            "detail": "Kpg. Taman No. 393, Kendari 83824, Sumatra Barat"
        },
        "image": {
            "filename": "b1a1843090954c638875c2ba142f0d66.png"
        }
    }
}
```

### Edit User

#### Spesification

| Specification |  |
| --- | --- |
| Description | Edit User |
| Method | PUT |
| URL | `{{config('app.url')}}/api/user/{id}` |
| Security | Token |
| Request | `application/json` |
| Response | `application/json` |

#### Request Header

| Name | Value |
| --- | --- |
| Authorization | `@{{token}}` |
| Accept | `application/json` |

#### Path Variable

| Name | Value |
| --- | --- |
| id | id user |

#### Request Body

| Name | Value |
| --- | --- |
| name | name|
| nik | 16 characters NIK|
| phone | phone number|
| email | email address|
| country | country name|
| state | state name|
| city | city name|
| postcode | postal code|
| detail | detail address|

#### Example Request

```json
{
    "name": "Latika Mardhi",
    "nik": "1302910703153399",
    "phone": "996539651440",
    "email": "harsanto.wijaya@example.org",
    "address": {
        "country": "Indonesia",
        "state": "Sumatera Barat",
        "city": "Palopo",
        "postcode": "13332",
        "detail": "Kpg. Taman No. 393, Kendari 83824, Sumatra Barat",
    },
}
```

#### Example Response

```json
{
    "meta": {
        "request_id": "d4305c48-65be-4961-a00f-5cb99a4ba8e0",
        "success": true,
        "code": "CDA-S-002",
        "message": "Data Updated Successfully"
    },
    "data": {
        "id": "7fe09b48-4c98-4df6-9d39-10fc5e6f41a0",
        "name": "Latika Mardhi",
        "nik": "1302910703153399",
        "phone": "996539651440",
        "email": "harsanto.wijaya@example.org",
        "created_at": "2024-08-12 15:11:09",
        "updated_at": "2024-08-12 15:11:09",
        "address": {
            "country": "Indonesia",
            "state": "Sumatera Barat",
            "city": "Palopo",
            "postcode": "13332",
            "detail": "Kpg. Taman No. 393, Kendari 83824, Sumatra Barat"
        },
        "image": {
            "filename": "516659cac3e7414c8f3eddc2af9de6cc.png"
        }
    }
}
```

### Delete User

#### Spesification

| Specification |  |
| --- | --- |
| Description | Delete User |
| Method | DELETE |
| URL | `{{config('app.url')}}/api/user/{id}` |
| Security | Token |
| Request | `application/json` |
| Response | `application/json` |

#### Request Header

| Name | Value |
| --- | --- |
| Authorization | `@{{token}}` |
| Accept | `application/json` |

#### Path Variable

| Name | Value |
| --- | --- |
| id | id user |

#### Example Response

```json
{
    "meta": {
        "request_id": "d3c34cb9-6adb-4ad6-9885-46c1f401b12a",
        "success": true,
        "code": "CDA-S-003",
        "message": "Successfully Delete User"
    },
    "data": null
}
```

### Get Image User

#### Spesification

| Specification |  |
| --- | --- |
| Description | Get Image User |
| Method | GET |
| URL | `{{config('app.url')}}/api/user/image/{id}` |
| Security | Token |
| Request | `application/json` |
| Response | `image/png` |

#### Request Header

| Name | Value |
| --- | --- |
| Authorization | `@{{token}}` |

#### Path Variable

| Name | Value |
| --- | --- |
| id | id user |

#### Example Response

```json
will return user image
```

### Update Image User

#### Spesification

| Specification |  |
| --- | --- |
| Description | Update Image User |
| Method | PUT |
| URL | `{{config('app.url')}}/api/user/image/{id}` |
| Security | Token |
| Request | `multipart/form-data` |
| Response | `application/json` |

#### Request Header

| Name | Value |
| --- | --- |
| Authorization | `@{{token}}` |
| Accept | `application/json` |

#### Path Variable

| Name | Value |
| --- | --- |
| id | id user |

#### Request (Multipart Form Data)

| Name | Value |
| --- | --- |
| file | image user in png/jpg |

#### Example Response

```json
{
    "meta": {
        "request_id": "38ccd2a3-5909-4c50-a948-ba58544501e0",
        "success": true,
        "code": "CDA-S-002",
        "message": "Image Updated Successfully"
    },
    "data": null
}
```
@endmarkdown
</x-layout.main-sidebar>
