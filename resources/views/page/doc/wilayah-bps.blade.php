<x-layout.main-doc title="Documentation | Wilayah BPS">
@markdown

# Wilayah Bps Api
Wilayah Bps Api Api merupakan api yang disediakan untuk menampilkan data infomasi wilayah berdasarkan data bps.

**Disclaimer** : data wilayah bisa jadi tidak sesuai, silahkan cek di laman resmi bps
## Endpoint
### Get List Provinsi

#### Spesification

| Specification |  |
| --- | --- |
| Description | Get List Provinsi |
| Method | GET |
| URL | `{{config('app.url')}}/api/wilayah/bps/provinsi` |
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
| URL | `{{config('app.url')}}/api/wilayah/bps/provinsi/{id}` |
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
        "request_id": "67044262-792c-4c39-8151-13bbe4b76036",
        "success": true,
        "code": "CDA-S-001",
        "message": "Successfully Get Provinsi"
    },
    "data": {
        "id": 1,
        "kode": "11",
        "nama": "ACEH"
    }
}
```

### Get List Kabupaten

#### Spesification

| Specification |  |
| --- | --- |
| Description | Get List Kabupaten |
| Method | GET |
| URL | `{{config('app.url')}}/api/wilayah/bps/kabupaten` |
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
        "request_id": "42be490b-5b66-490c-9dda-d844c39af190",
        "success": true,
        "code": "CDA-S-001",
        "message": "Successfully Get List Kabupaten"
    },
    "data": [
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
| URL | `{{config('app.url')}}/api/wilayah/bps/kabupaten/{id}` |
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
        "request_id": "ef9e336b-540a-44ce-8f24-e64c24b381a3",
        "success": true,
        "code": "CDA-S-001",
        "message": "Successfully Get Kabupaten"
    },
    "data": {
        "id": 123,
        "kode": "1708",
        "nama": "KEPAHIANG"
    }
}
```

### Get List Kecamatan

#### Spesification

| Specification |  |
| --- | --- |
| Description | Get List Kecamatan |
| Method | GET |
| URL | `{{config('app.url')}}/api/wilayah/bps/kecamatan` |
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
        "request_id": "4e62347c-b94d-490a-b29d-09a7531ad244",
        "success": true,
        "code": "CDA-S-001",
        "message": "Successfully Get List Kecamatan"
    },
    "data": [
        {
            "id": 3360,
            "nama": "MOJO"
        },
        {
            "id": 3361,
            "nama": "SEMEN"
        },
        {
            "id": 3362,
            "nama": "NGADILUWIH"
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
| URL | `{{config('app.url')}}/api/wilayah/bps/kecamatan/{id}` |
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
        "request_id": "7d309f0e-cdb5-4bc6-9abd-e25e7639c4e4",
        "success": true,
        "code": "CDA-S-001",
        "message": "Successfully Get Kecamatan"
    },
    "data": {
        "id": 2500,
        "kode": "3216121",
        "nama": "SUKAKARYA"
    }
}
```

### Get List Desa

#### Spesification

| Specification |  |
| --- | --- |
| Description | Get List Desa |
| Method | GET |
| URL | `{{config('app.url')}}/api/wilayah/bps/desa` |
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
        "request_id": "3687757a-47d7-4f90-bb45-2fa2b9d1c645",
        "success": true,
        "code": "CDA-S-001",
        "message": "Successfully Get List Desa"
    },
    "data": [
        {
            "id": 29940,
            "nama": "PUSAKARATU"
        },
        {
            "id": 29941,
            "nama": "GEMPOL"
        },
        {
            "id": 29942,
            "nama": "KALENTAMBO"
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
| URL | `{{config('app.url')}}/api/wilayah/bps/desa/{id}` |
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
        "request_id": "7ce19183-f879-4b68-b03b-0fb1adb0954e",
        "success": true,
        "code": "CDA-S-001",
        "message": "Successfully Get Desa"
    },
    "data": {
        "id": 2500,
        "kode": "1108100066",
        "nama": "BUKLOH"
    }
}
```
@endmarkdown
</x-layout.main-doc>
