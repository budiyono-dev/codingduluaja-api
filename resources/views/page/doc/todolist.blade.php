<x-layout.main-sidebar title="Documentation | Todolist">
    @push('styles')
    <script src="{{ asset('assets/hjs/highlight.min.js') }}"></script>
    <script src="{{ asset('assets/hjs/json.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/hjs/github-dark.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/doc.css') }}">
    <script>
        hljs.highlightAll();
    </script>
    @endpush
    <div class="row">
        <div class="col-3 border-end">
            <ul id="daftar-isi"></ul>
        </div>
        <div class="col-9 ps-3 main-doc">
            @markdown
            # Todolist Api
            Api Todolist merupakan api yang disediakan untuk menyimpan task todo pada tanggal tertentu
            ## Endpoint
            ### Get All Todolist
            
            #### Spesification
            
            | Specification |  |
            | --- | --- |
            | Description | Get All Todolist |
            | Method | GET |
            | URL | `{{config('app.url')}}/api/todolist` |
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
            ```
            
            ### Get Detail Todolist
            
            #### Spesification
            
            | Specification |  |
            | --- | --- |
            | Description | Get Detail Todolist |
            | Method | GET |
            | URL | `{{config('app.url')}}/api/todolist/{id}` |
            | Security | Token |
            | Request | `application/json` |
            | Response | `application/json` |
            
            #### Request Header

            | Name | Value |
            | --- | --- |
            | Authorization | `@{{token}}` |
            | Accept | `application/json` |
            
            #### Parameter
            
            | Name | Value |
            | --- | --- |
            | id | id todolist |
            
            #### Example Response
            
            ```json
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
            ```
            
            
            ### Create Todolist
            
            #### Spesification
            
            | Specification |  |
            | --- | --- |
            | Description | Create Todolist |
            | Method | POST |
            | URL | `{{config('app.url')}}/api/todolist` |
            | Security | Token |
            | Request | `application/json` |
            | Response | `application/json` |
            
            #### Request Header

            | Name | Value |
            | --- | --- |
            | Authorization | `@{{token}}` |
            | Accept | `application/json` |
            
            #### Request Body
            
            | Name | Value |
            | --- | --- |
            | date | date todolist |
            | name | name todolist |
            | description | description todolist |
            
            #### Example Request
            
            ```json
            {
                "date": "2024-08-11 22:30:28",
                "name": "watching football",
                "description": "MU VS Liverpol"
            } 
            ```
            
            #### Example Response
            
            ```json
            {
                "meta": {
                    "request_id": "ed9173c3-a58a-486f-b7ac-70ee92c7ca0a",
                    "success": true,
                    "code": "CDA-S-006",
                    "message": "Data Inserted Successfully"
                },
                "data": {
                    "id": "1",
                    "date": "2024-08-11 22:34:51",
                    "name": "watching football",
                    "description": "MU VS Liverpol",
                    "created_at": "2024-08-11 22:34:51",
                    "updated_at": "2024-08-11 22:34:51"
                }
            } 
            ```
            
            ### Edit Todolist
            
            #### Spesification
            
            | Specification |  |
            | --- | --- |
            | Description | Edit Todolist |
            | Method | PUT |
            | URL | `{{config('app.url')}}/api/todolist/{id}` |
            | Security | Token |
            | Request | `application/json` |
            | Response | `application/json` |
            
            #### Request Header

            | Name | Value |
            | --- | --- |
            | Authorization | `@{{token}}` |
            | Accept | `application/json` |
            
            #### Request Body
            
            | Name | Value |
            | --- | --- |
            | date | date todolist |
            | name | name todolist |
            | description | description todolist |
            
            #### Example Request
            
            ```json
            {
                "date": "2024-08-13",
                "name": "Maraton One Piece",
                "description": "Maraton One Piece From Episode 1"
            } 
            ```
            
            #### Example Response
            
            ```json
            {
                "meta": {
                    "request_id": "584b92e9-b495-4902-8863-2d5c1976fac3",
                    "success": true,
                    "code": "CDA-S-002",
                    "message": "Data Updated Successfully"
                },
                "data": {
                    "id": "1",
                    "date": "2024-08-13",
                    "name": "Maraton One Piece",
                    "description": "Maraton One Piece From Episode 1",
                    "created_at": "2024-08-11 23:00:11",
                    "updated_at": "2024-08-11 23:00:11"
                }
            } 
            ```
            
            ### Delete Todolist
            
            #### Spesification
            
            | Specification |  |
            | --- | --- |
            | Description | Delete Todolist |
            | Method | DELETE |
            | URL | `{{config('app.url')}}/api/todolist/{id}` |
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
                    "request_id": "1f33c902-cf1c-4f3d-8028-94633809bf30",
                    "success": true,
                    "code": "CDA-S-003",
                    "message": "Data Deleted Successfully"
                },
                "data": null
            }
            ```
            @endmarkdown
        </div>
    </div>
    @push('script')
    <script src="{{ asset('assets/js/doc.js') }}"></script>
    @endpush
</x-layout.main-sidebar>
