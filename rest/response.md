# Todolist Api
## GET http://localhost:8000/api/todolist
```json
{
  "meta": {
    "request_id": "94082663-416b-48cf-adc8-2779a8c10362",
    "success": true,
    "code": "CDA-S-001",
    "message": "Successfully Get Todolist"
  },
  "data": [
    {
      "id": "1",
      "date": "2023-12-31",
      "name": "Rerum autem distinctio.",
      "description": "Est vero eligendi reiciendis corporis cupiditate voluptas et.",
      "created_at": "2023-12-21 08:28:30",
      "updated_at": "2023-12-21 08:28:30"
    },
    {
      "id": "2",
      "date": "2023-12-28",
      "name": "Sed ab aut.",
      "description": "Magnam et velit delectus exercitationem qui quia est qui excepturi est harum.",
      "created_at": "2023-12-21 08:28:30",
      "updated_at": "2023-12-21 08:28:30"
    }
  ]
}
```

## DELETE http://localhost:8000/api/todolist/{id}
```json
{
  "meta": {
    "request_id": "5504d11a-89f8-4cd8-b718-5e02538c5add",
    "success": true,
    "code": "CDA-S-003",
    "message": "Data Deleted Successfully"
  },
  "data": null
}
```

## POST http://localhost:8000/api/todolist
```json
{
  "meta": {
    "request_id": "ff325861-deb3-47ae-aea1-fc299c6bc7b9",
    "success": true,
    "code": "CDA-S-001",
    "message": "Data Inserted Successfully"
  },
  "data": null
}
```

## PUT http://localhost:8000/api/todolist/1
```json
{
  "meta": {
    "request_id": "afee1673-e721-48ee-b6da-418c2d64201d",
    "success": true,
    "code": "CDA-S-002",
    "message": "Data Updated Successfully"
  },
  "data": null
}
```

## GET http://localhost:8000/api/todolist/1
```json
{
  "meta": {
    "request_id": "7216c183-c3c2-4501-9c1c-a986a0bfa6ac",
    "success": true,
    "code": "CDA-S-001",
    "message": "Successfully Get Todolist"
  },
  "data": {
    "id": 1,
    "user_id": 1,
    "date": "2023-12-24",
    "name": "watching tv",
    "description": "watching naruto",
    "created_at": "2023-12-21T08:28:30.000000Z",
    "updated_at": "2023-12-22T03:07:06.000000Z"
  }
}
```

## GET http://localhost:8000/api/wilayah/bps/provinsi
```json
{
    "meta":
    {
        "request_id": "09401522-b8db-4270-9f98-d4576feb8098",
        "success": true,
        "code": "CDA-S-001",
        "message": "Successfully Get List Provinsi"
    },
    "data":
    [
        {
            "id": 1,
            "nama": "ACEH"
        },
        {
            "id": 2,
            "nama": "SUMATERA UTARA"
        },
        {
            "id": 3,
            "nama": "SUMATERA BARAT"
        },
        {
            "id": 4,
            "nama": "RIAU"
        },
        {
            "id": 5,
            "nama": "JAMBI"
        },
        {
            "id": 6,
            "nama": "SUMATERA SELATAN"
        },
        {
            "id": 7,
            "nama": "BENGKULU"
        },
        {
            "id": 8,
            "nama": "LAMPUNG"
        },
        {
            "id": 9,
            "nama": "KEP. BANGKA BELITUNG"
        },
        {
            "id": 10,
            "nama": "KEP. RIAU"
        },
        {
            "id": 11,
            "nama": "DKI JAKARTA"
        },
        {
            "id": 12,
            "nama": "JAWA BARAT"
        },
        {
            "id": 13,
            "nama": "JAWA TENGAH"
        },
        {
            "id": 14,
            "nama": "DI YOGYAKARTA"
        },
        {
            "id": 15,
            "nama": "JAWA TIMUR"
        },
        {
            "id": 16,
            "nama": "BANTEN"
        },
        {
            "id": 17,
            "nama": "BALI"
        },
        {
            "id": 18,
            "nama": "NUSA TENGGARA BARAT"
        },
        {
            "id": 19,
            "nama": "NUSA TENGGARA TIMUR"
        },
        {
            "id": 20,
            "nama": "KALIMANTAN BARAT"
        },
        {
            "id": 21,
            "nama": "KALIMANTAN TENGAH"
        },
        {
            "id": 22,
            "nama": "KALIMANTAN SELATAN"
        },
        {
            "id": 23,
            "nama": "KALIMANTAN TIMUR"
        },
        {
            "id": 24,
            "nama": "KALIMANTAN UTARA"
        },
        {
            "id": 25,
            "nama": "SULAWESI UTARA"
        },
        {
            "id": 26,
            "nama": "SULAWESI TENGAH"
        },
        {
            "id": 27,
            "nama": "SULAWESI SELATAN"
        },
        {
            "id": 28,
            "nama": "SULAWESI TENGGARA"
        },
        {
            "id": 29,
            "nama": "GORONTALO"
        },
        {
            "id": 30,
            "nama": "SULAWESI BARAT"
        },
        {
            "id": 31,
            "nama": "MALUKU"
        },
        {
            "id": 32,
            "nama": "MALUKU UTARA"
        },
        {
            "id": 33,
            "nama": "PAPUA BARAT"
        },
        {
            "id": 34,
            "nama": "PAPUA"
        }
    ]
}
```

## GET http://localhost:8000/api/wilayah/bps/provinsi/{id}
```json
{
    "meta":
    {
        "request_id": "67044262-792c-4c39-8151-13bbe4b76036",
        "success": true,
        "code": "CDA-S-001",
        "message": "Successfully Get Provinsi"
    },
    "data":
    {
        "id": 1,
        "kode": "11",
        "nama": "ACEH"
    }
}
```

## GET http://localhost:8000/api/wilayah/bps/kabupaten?provinsi_id=1
```json
{
    "meta":
    {
        "request_id": "42be490b-5b66-490c-9dda-d844c39af190",
        "success": true,
        "code": "CDA-S-001",
        "message": "Successfully Get List Kabupaten"
    },
    "data":
    [
        {
            "id": 1,
            "nama": "SIMEULUE"
        },
        {
            "id": 2,
            "nama": "ACEH SINGKIL"
        },
        {
            "id": 3,
            "nama": "ACEH SELATAN"
        },
        {
            "id": 4,
            "nama": "ACEH TENGGARA"
        },
        {
            "id": 5,
            "nama": "ACEH TIMUR"
        },
        {
            "id": 6,
            "nama": "ACEH TENGAH"
        },
        {
            "id": 7,
            "nama": "ACEH BARAT"
        },
        {
            "id": 8,
            "nama": "ACEH BESAR"
        },
        {
            "id": 9,
            "nama": "PIDIE"
        },
        {
            "id": 10,
            "nama": "BIREUEN"
        },
        {
            "id": 11,
            "nama": "ACEH UTARA"
        },
        {
            "id": 12,
            "nama": "ACEH BARAT DAYA"
        },
        {
            "id": 13,
            "nama": "GAYO LUES"
        },
        {
            "id": 14,
            "nama": "ACEH TAMIANG"
        },
        {
            "id": 15,
            "nama": "NAGAN RAYA"
        },
        {
            "id": 16,
            "nama": "ACEH JAYA"
        },
        {
            "id": 17,
            "nama": "BENER MERIAH"
        },
        {
            "id": 18,
            "nama": "PIDIE JAYA"
        },
        {
            "id": 19,
            "nama": "BANDA ACEH"
        },
        {
            "id": 20,
            "nama": "SABANG"
        },
        {
            "id": 21,
            "nama": "LANGSA"
        },
        {
            "id": 22,
            "nama": "LHOKSEUMAWE"
        },
        {
            "id": 23,
            "nama": "SUBULUSSALAM"
        }
    ]
}
```

## GET http://localhost:8000/api/wilayah/bps/kabupaten/123
```json
{
    "meta":
    {
        "request_id": "ef9e336b-540a-44ce-8f24-e64c24b381a3",
        "success": true,
        "code": "CDA-S-001",
        "message": "Successfully Get Kabupaten"
    },
    "data":
    {
        "id": 123,
        "kode": "1708",
        "nama": "KEPAHIANG"
    }
}
```