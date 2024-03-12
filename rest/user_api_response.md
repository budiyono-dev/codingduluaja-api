# User Api
## get list user

```json
{
  "meta": {
    "request_id": "50a41328-a11a-4c47-918e-d7d70ab81102",
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
```