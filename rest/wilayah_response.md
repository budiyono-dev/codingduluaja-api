# Wilayah Bps

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

## GET http://localhost:8000/api/wilayah/bps/kecamatan?kabupaten_id=233
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
    },
    {
      "id": 3363,
      "nama": "KRAS"
    },
    {
      "id": 3364,
      "nama": "RINGINREJO"
    },
    {
      "id": 3365,
      "nama": "KANDAT"
    },
    {
      "id": 3366,
      "nama": "WATES"
    },
    {
      "id": 3367,
      "nama": "NGANCAR"
    },
    {
      "id": 3368,
      "nama": "PLOSOKLATEN"
    },
    {
      "id": 3369,
      "nama": "GURAH"
    },
    {
      "id": 3370,
      "nama": "PUNCU"
    },
    {
      "id": 3371,
      "nama": "KEPUNG"
    },
    {
      "id": 3372,
      "nama": "KANDANGAN"
    },
    {
      "id": 3373,
      "nama": "PARE"
    },
    {
      "id": 3374,
      "nama": "BADAS"
    },
    {
      "id": 3375,
      "nama": "KUNJANG"
    },
    {
      "id": 3376,
      "nama": "PLEMAHAN"
    },
    {
      "id": 3377,
      "nama": "PURWOASRI"
    },
    {
      "id": 3378,
      "nama": "PAPAR"
    },
    {
      "id": 3379,
      "nama": "PAGU"
    },
    {
      "id": 3380,
      "nama": "KAYEN KIDUL"
    },
    {
      "id": 3381,
      "nama": "GAMPENGREJO"
    },
    {
      "id": 3382,
      "nama": "NGASEM"
    },
    {
      "id": 3383,
      "nama": "BANYAKAN"
    },
    {
      "id": 3384,
      "nama": "GROGOL"
    },
    {
      "id": 3385,
      "nama": "TAROKAN"
    }
  ]
}
```

## GET http://localhost:8000/api/wilayah/bps/kecamatan/2500
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

## GET http://localhost:8000/api/wilayah/bps/desa?kecamatan_id=2430
```json
{
    "meta":
    {
        "request_id": "3687757a-47d7-4f90-bb45-2fa2b9d1c645",
        "success": true,
        "code": "CDA-S-001",
        "message": "Successfully Get List Desa"
    },
    "data":
    [
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
        },
        {
            "id": 29943,
            "nama": "KOTASARI"
        },
        {
            "id": 29944,
            "nama": "RANCADAKA"
        },
        {
            "id": 29945,
            "nama": "PATIMBAN"
        },
        {
            "id": 29946,
            "nama": "MUNDUSARI"
        }
    ]
}
```

## GET http://localhost:8000/api/wilayah/bps/desa/2500
```json
{
    "meta":
    {
        "request_id": "7ce19183-f879-4b68-b03b-0fb1adb0954e",
        "success": true,
        "code": "CDA-S-001",
        "message": "Successfully Get Desa"
    },
    "data":
    {
        "id": 2500,
        "kode": "1108100066",
        "nama": "BUKLOH"
    }
}
```

# Wilayah DAGRI

## GET http://localhost:8000/api/wilayah/dagri/provinsi
```json
{
    "meta":
    {
        "request_id": "52b148e5-cf9f-45ad-82d4-b51870248d5e",
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

## GET http://localhost:8000/api/wilayah/dagri/provinsi/{id}
```json
{
    "meta":
    {
        "request_id": "0e99ab42-5e7b-4529-a689-759d57484356",
        "success": true,
        "code": "CDA-S-001",
        "message": "Successfully Get Provinsi"
    },
    "data":
    {
        "id": 34,
        "kode": "91",
        "nama": "PAPUA"
    }
}
```

## GET http://localhost:8000/api/wilayah/dagri/kabupaten?provinsi_id=13
```json
{
    "meta":
    {
        "request_id": "4fea5a6d-c37d-4b23-a58d-5d75e3b8f384",
        "success": true,
        "code": "CDA-S-001",
        "message": "Successfully Get List Kabupaten"
    },
    "data":
    [
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
        },
        {
            "id": 191,
            "nama": "KAB. BANJARNEGARA"
        },
        {
            "id": 192,
            "nama": "KAB. KEBUMEN"
        },
        {
            "id": 193,
            "nama": "KAB. PURWOREJO"
        },
        {
            "id": 194,
            "nama": "KAB. WONOSOBO"
        },
        {
            "id": 195,
            "nama": "KAB. MAGELANG"
        },
        {
            "id": 196,
            "nama": "KAB. BOYOLALI"
        },
        {
            "id": 197,
            "nama": "KAB. KLATEN"
        },
        {
            "id": 198,
            "nama": "KAB. SUKOHARJO"
        },
        {
            "id": 199,
            "nama": "KAB. WONOGIRI"
        },
        {
            "id": 200,
            "nama": "KAB. KARANGANYAR"
        },
        {
            "id": 201,
            "nama": "KAB. SRAGEN"
        },
        {
            "id": 202,
            "nama": "KAB. GROBOGAN"
        },
        {
            "id": 203,
            "nama": "KAB. BLORA"
        },
        {
            "id": 204,
            "nama": "KAB. REMBANG"
        },
        {
            "id": 205,
            "nama": "KAB. PATI"
        },
        {
            "id": 206,
            "nama": "KAB. KUDUS"
        },
        {
            "id": 207,
            "nama": "KAB. JEPARA"
        },
        {
            "id": 208,
            "nama": "KAB. DEMAK"
        },
        {
            "id": 209,
            "nama": "KAB. SEMARANG"
        },
        {
            "id": 210,
            "nama": "KAB. TEMANGGUNG"
        },
        {
            "id": 211,
            "nama": "KAB. KENDAL"
        },
        {
            "id": 212,
            "nama": "KAB. BATANG"
        },
        {
            "id": 213,
            "nama": "KAB. PEKALONGAN"
        },
        {
            "id": 214,
            "nama": "KAB. PEMALANG"
        },
        {
            "id": 215,
            "nama": "KAB. TEGAL"
        },
        {
            "id": 216,
            "nama": "KAB. BREBES"
        },
        {
            "id": 217,
            "nama": "KOTA MAGELANG"
        },
        {
            "id": 218,
            "nama": "KOTA SURAKARTA"
        },
        {
            "id": 219,
            "nama": "KOTA SALATIGA"
        },
        {
            "id": 220,
            "nama": "KOTA SEMARANG"
        },
        {
            "id": 221,
            "nama": "KOTA PEKALONGAN"
        },
        {
            "id": 222,
            "nama": "KOTA TEGAL"
        }
    ]
}
```

## GET http://localhost:8000/api/wilayah/dagri/kabupaten/190
```json
{
    "meta":
    {
        "request_id": "2e32eb96-b28f-4c15-8029-b9d0afef3eea",
        "success": true,
        "code": "CDA-S-001",
        "message": "Successfully Get Kabupaten"
    },
    "data":
    {
        "id": 190,
        "kode": "33.03",
        "nama": "KAB. PURBALINGGA"
    }
}
```

## GET http://localhost:8000/api/wilayah/dagri/kecamatan?kabupaten_id=198
```json
{
    "meta":
    {
        "request_id": "ac13d412-9077-43e6-85c2-392e963f8c01",
        "success": true,
        "code": "CDA-S-001",
        "message": "Successfully Get List Kecamatan"
    },
    "data":
    [
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
        },
        {
            "id": 2645,
            "nama": "RAWALO"
        },
        {
            "id": 2646,
            "nama": "KEBASEN"
        },
        {
            "id": 2647,
            "nama": "KEMRANJEN"
        },
        {
            "id": 2648,
            "nama": "SUMPIUH"
        },
        {
            "id": 2649,
            "nama": "TAMBAK"
        },
        {
            "id": 2650,
            "nama": "SOMAGEDE"
        },
        {
            "id": 2651,
            "nama": "KALIBAGOR"
        },
        {
            "id": 2652,
            "nama": "BANYUMAS"
        },
        {
            "id": 2653,
            "nama": "PATIKRAJA"
        },
        {
            "id": 2654,
            "nama": "PURWOJATI"
        },
        {
            "id": 2655,
            "nama": "AJIBARANG"
        },
        {
            "id": 2656,
            "nama": "GUMELAR"
        },
        {
            "id": 2657,
            "nama": "PEKUNCEN"
        },
        {
            "id": 2658,
            "nama": "CILONGOK"
        },
        {
            "id": 2659,
            "nama": "KARANGLEWAS"
        },
        {
            "id": 2660,
            "nama": "KEDUNGBANTENG"
        },
        {
            "id": 2661,
            "nama": "BATURRADEN"
        },
        {
            "id": 2662,
            "nama": "SUMBANG"
        },
        {
            "id": 2663,
            "nama": "KEMBARAN"
        },
        {
            "id": 2664,
            "nama": "SOKARAJA"
        },
        {
            "id": 2665,
            "nama": "PURWOKERTO SELATAN"
        },
        {
            "id": 2666,
            "nama": "PURWOKERTO BARAT"
        },
        {
            "id": 2667,
            "nama": "PURWOKERTO TIMUR"
        },
        {
            "id": 2668,
            "nama": "PURWOKERTO UTARA"
        }
    ]
}
```

## GET http://localhost:8000/api/wilayah/dagri/kecamatan/2643
```json
{
    "meta":
    {
        "request_id": "b9f2d920-e810-497e-9aa6-06f546e90fe3",
        "success": true,
        "code": "CDA-S-001",
        "message": "Successfully Get Kecamatan"
    },
    "data":
    {
        "id": 2643,
        "kode": "33.02.02",
        "nama": "WANGON"
    }
}
```

## GET http://localhost:8000/api/wilayah/dagri/desa?kecamatan_id=2643
```json
{
    "meta":
    {
        "request_id": "bf49a868-30a6-4159-ac4e-edaa729b766e",
        "success": true,
        "code": "CDA-S-001",
        "message": "Successfully Get List Desa"
    },
    "data":
    [
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
        },
        {
            "id": 31716,
            "nama": "KLAPAGADING"
        },
        {
            "id": 31717,
            "nama": "KLAPAGADING KULON"
        },
        {
            "id": 31718,
            "nama": "WANGON"
        },
        {
            "id": 31719,
            "nama": "BANTERAN"
        },
        {
            "id": 31720,
            "nama": "JAMBU"
        },
        {
            "id": 31721,
            "nama": "JURANGBAHAS"
        },
        {
            "id": 31722,
            "nama": "CIKAKAK"
        },
        {
            "id": 31723,
            "nama": "WLAHAR"
        },
        {
            "id": 31724,
            "nama": "WINDUNEGARA"
        }
    ]
}
```

## GET http://localhost:8000/api/wilayah/dagri/desa/31723
```json
{
    "meta":
    {
        "request_id": "3260575f-868b-49f6-9589-cd72f4c37c89",
        "success": true,
        "code": "CDA-S-001",
        "message": "Successfully Get Desa"
    },
    "data":
    {
        "id": 31723,
        "kode": "33.02.02.2010",
        "nama": "WLAHAR"
    }
}
```
