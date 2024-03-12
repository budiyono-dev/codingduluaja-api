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