<x-layout.main-doc title="Documentation | Wilayah DAGRI">
@markdown

# Wilayah Dagri Api
Wilayah Dagri Api Api merupakan api yang disediakan untuk menampilkan data infomasi wilayah berdasarkan data dagri.

**Disclaimer** : data wilayah bisa jadi tidak sesuai, silahkan cek di laman resmi dagri
## Endpoint
### Get List Provinsi

#### Spesification

| Specification |  |
| --- | --- |
| Description | Get List Provinsi |
| Method | GET |
| URL | `{{config('app.url')}}/api/wilayah/dagri/provinsi` |
| Security | Token |
| Request | `application/json` |
| Response | `application/json` |

#### Request Header

| Name | Value |
| --- | --- |
| Authorization | `@{{token}}` |
| Accept | `application/json` |

#### Example Response

```json
{
    "meta": {
        "request_id": "09401522-b8db-4270-9f98-d4576feb8098",
        "success": true,
        "code": "CDA-S-001",
        "message": "Successfully Get List Provinsi"
    },
    "data": [
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
        }
    ]
}
```

### Get Detail Provinsi

#### Spesification

| Specification |  |
| --- | --- |
| Description | Get Detail Provinsi |
| Method | GET |
| URL | `{{config('app.url')}}/api/wilayah/dagri/provinsi/{id}` |
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
| id | id provinsi |

#### Example Response

```json
{
    "meta": {
        "request_id": "0e99ab42-5e7b-4529-a689-759d57484356",
        "success": true,
        "code": "CDA-S-001",
        "message": "Successfully Get Provinsi"
    },
    "data": {
        "id": 34,
        "kode": "91",
        "nama": "PAPUA"
    }
}
```

### Get List Kabupaten

#### Spesification

| Specification |  |
| --- | --- |
| Description | Get List Kabupaten |
| Method | GET |
| URL | `{{config('app.url')}}/api/wilayah/dagri/kabupaten` |
| Security | Token |
| Request | `application/json` |
| Response | `application/json` |

#### Request Header

| Name | Value |
| --- | --- |
| Authorization | `@{{token}}` |
| Accept | `application/json` |

#### Request Param

| Name | Value |
| --- | --- |
| provinsi_id | provinsi_id of kabupaten |

#### Example Response

```json
{
    "meta": {
        "request_id": "4fea5a6d-c37d-4b23-a58d-5d75e3b8f384",
        "success": true,
        "code": "CDA-S-001",
        "message": "Successfully Get List Kabupaten"
    },
    "data": [
        {
            "id": 188,
            "nama": "KAB. CILACAP"
        },
        {
            "id": 189,
            "nama": "KAB. BANYUMAS"
        },
        {
            "id": 190,
            "nama": "KAB. PURBALINGGA"
        }
    ]
}
```

### Get Detail Kabupaten

#### Spesification

| Specification |  |
| --- | --- |
| Description | Get Detail Kabupaten |
| Method | GET |
| URL | `{{config('app.url')}}/api/wilayah/dagri/kabupaten/{id}` |
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
| id | id kabupaten |

#### Example Response

```json
{
    "meta": {
        "request_id": "2e32eb96-b28f-4c15-8029-b9d0afef3eea",
        "success": true,
        "code": "CDA-S-001",
        "message": "Successfully Get Kabupaten"
    },
    "data": {
        "id": 190,
        "kode": "33.03",
        "nama": "KAB. PURBALINGGA"
    }
}
```

### Get List Kecamatan

#### Spesification

| Specification |  |
| --- | --- |
| Description | Get List Kecamatan |
| Method | GET |
| URL | `{{config('app.url')}}/api/wilayah/dagri/kecamatan` |
| Security | Token |
| Request | `application/json` |
| Response | `application/json` |

#### Request Header

| Name | Value |
| --- | --- |
| Authorization | `@{{token}}` |
| Accept | `application/json` |

#### Request Param

| Name | Value |
| --- | --- |
| kabupaten_id | kabupaten_id of kecamatan |

#### Example Response

```json
{
    "meta": {
        "request_id": "ac13d412-9077-43e6-85c2-392e963f8c01",
        "success": true,
        "code": "CDA-S-001",
        "message": "Successfully Get List Kecamatan"
    },
    "data": [
        {
            "id": 2642,
            "nama": "LUMBIR"
        },
        {
            "id": 2643,
            "nama": "WANGON"
        },
        {
            "id": 2644,
            "nama": "JATILAWANG"
        }
    ]
}
```

### Get Detail Kecamatan

#### Spesification

| Specification |  |
| --- | --- |
| Description | Get Detail Kecamatan |
| Method | GET |
| URL | `{{config('app.url')}}/api/wilayah/dagri/kecamatan/{id}` |
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
| id | id kecamatan |

#### Example Response

```json
{
    "meta": {
        "request_id": "b9f2d920-e810-497e-9aa6-06f546e90fe3",
        "success": true,
        "code": "CDA-S-001",
        "message": "Successfully Get Kecamatan"
    },
    "data": {
        "id": 2643,
        "kode": "33.02.02",
        "nama": "WANGON"
    }
}
```

### Get List Desa

#### Spesification

| Specification |  |
| --- | --- |
| Description | Get List Desa |
| Method | GET |
| URL | `{{config('app.url')}}/api/wilayah/dagri/desa` |
| Security | Token |
| Request | `application/json` |
| Response | `application/json` |

#### Request Header

| Name | Value |
| --- | --- |
| Authorization | `@{{token}}` |
| Accept | `application/json` |

#### Request Param

| Name | Value |
| --- | --- |
| kecamatan_id | kecamatan_id of desa |

#### Example Response

```json
{
    "meta": {
        "request_id": "bf49a868-30a6-4159-ac4e-edaa729b766e",
        "success": true,
        "code": "CDA-S-001",
        "message": "Successfully Get List Desa"
    },
    "data": [
        {
            "id": 31713,
            "nama": "RANDEGAN"
        },
        {
            "id": 31714,
            "nama": "RAWAHENG"
        },
        {
            "id": 31715,
            "nama": "PENGADEGAN"
        }
    ]
}
```

### Get Detail Desa

#### Spesification

| Specification |  |
| --- | --- |
| Description | Get Detail Desa |
| Method | GET |
| URL | `{{config('app.url')}}/api/wilayah/dagri/desa/{id}` |
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
| id | id desa |

#### Example Response

```json
{
    "meta": {
        "request_id": "3260575f-868b-49f6-9589-cd72f4c37c89",
        "success": true,
        "code": "CDA-S-001",
        "message": "Successfully Get Desa"
    },
    "data": {
        "id": 31723,
        "kode": "33.02.02.2010",
        "nama": "WLAHAR"
    }
}
```
@endmarkdown
</x-layout.main-doc>
