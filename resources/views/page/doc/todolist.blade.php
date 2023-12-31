<x-layout.main-sidebar title="Documentation Todolist">
    <div class="d-flex f-w">

        <div class="doc-main doc">
            <h1 class="fs-2" id="apiName">Todolist Api</h3>
            <p>Api Todolist merupakan api yang disediakan untuk menyimpan task todo pada tanggal tertentu</p>
            <h3 class="fs-4" id="listEndpoint">List Endpoint</h3>
            <p>Berikut list endpoint yang disediakan untuk Api Todolist, pastikan menambahkan token kedalam <strong>Header</strong> untuk setiap request. <code>X-Authorization: Bearer @{{your_token}}</code></p>
            
            <h3 class="fs-6 fw-bold" id="getAll">Get All Todolist</h3>
            <p>Mengambil semua data todolist, method : <code>GET</code>, endpoint : <code>{{$endpoint}}/api/todolist</code>, contoh response :</p>
            <pre class="card" ><code class="language-json" id="resGetAll"></code></pre>
            
            <h3 class="fs-6 fw-bold" id="getSingle">Get Single Todolist</h3>
            <p>Mengambil data todolist berdasarkan id, method : <code>GET</code>, endpoint : <code>{{$endpoint}}/api/todolist/{id}</code>, contoh response :</p>
            <pre class="card" ><code class="language-json" id="resGetSingle"></code></pre>

            <h3 class="fs-6 fw-bold" id="create">Create Todolist</h3>
            <p>Mengambil data todolist berdasarkan id, method : <code>POST</code>, endpoint : <code>{{$endpoint}}/api/todolist</code></p>
            <p>Request body :</p>
            <table class="table table-hover table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Field Name</th>
                        <th scope="col">Type</th>
                        <th scope="col">Length</th>
                        <th scope="col">Mandatory</th>
                        <th scope="col">Description</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row">1</td>
                        <td>date</td>
                        <td>String</td>
                        <td>-</td>
                        <td>Y</td>
                        <td>Format dd-mm-yyyy, more or equals than today</td>
                    </tr>
                    <tr>
                        <td scope="row">2</td>
                        <td>name</td>
                        <td>String</td>
                        <td>50</td>
                        <td>Y</td>
                        <td>Letter and Space</td>
                    </tr>
                    <tr>
                        <td scope="row">3</td>
                        <td>description</td>
                        <td>String</td>
                        <td>1000</td>
                        <td>N</td>
                        <td>-</td>
                    </tr>
                </tbody>
            </table>
            <pre class="card" ><code class="language-json" id="reqCreate"></code></pre>
            <p>Response body :</p>
            <pre class="card" ><code class="language-json" id="resCreate"></code></pre>

            <h3 class="fs-6 fw-bold" id="edit">Edit Todolist</h3>
            <p>Mengambil data todolist berdasarkan id, method : <code>POST</code>, endpoint : <code>{{$endpoint}}/api/todolist</code></p>
            <p>Request body :</p>
            <pre class="card" ><code class="language-json" id="reqEdit"></code></pre>
            <p>Response body :</p>
            <pre class="card" ><code class="language-json" id="resEdit"></code></pre>

            <h3 class="fs-6 fw-bold" id="delete">Delete Todolist</h3>
            <p>Mengambil data todolist berdasarkan id, method : <code>DELETE</code>, endpoint : <code>{{$endpoint}}/api/todolist/{id}</code>, contoh response :</p>
            <pre class="card" ><code class="language-json" id="resDelete"></code></pre>

            <h3 class="fs-4" id="listError">Error Example</h3>
            <p>Berikut contoh error response :</p>

            <h3 class="fs-6 fw-bold" id="unAuthorize">Unauthorized</h3>
            <pre class="card" ><code class="language-json" id="resAnautorize"></code></pre>

            <h3 class="fs-6 fw-bold" id="notFound">Not Found</h3>
            <pre class="card" ><code class="language-json" id="resNotFound"></code></pre>

            <h3 class="fs-6 fw-bold" id="notValid">Not Valid</h3>
            <pre class="card" ><code class="language-json" id="resNotValid"></code></pre>
            
            
            
        </div>
        <nav id="TableOfContents" class="nav-doc border-end doc">
            <ul>
                <li><a class="link-dark" href="#apiName">Todolist Api</a></li>
                <li><a class="link-dark" href="#listEndpoint">Endpoint List</a>
                    <ul>
                        <li><a class="link-dark" href="#getAll">Get All Todolist</a></li>
                        <li><a class="link-dark" href="#getSingle">Get Single Todolist</a></li>
                        <li><a class="link-dark" href="#create">Create Todolist</a></li>
                        <li><a class="link-dark" href="#edit">Edit Todolist</a></li>
                        <li><a class="link-dark" href="#delete">Delete Todolist</a></li>
                    </ul>
                </li>
                <li><a class="link-dark" href="#listError">Error Example</a>
                    <ul>
                        <li><a class="link-dark" href="#unAuthorize">Unauthorized</a></li>
                        <li><a class="link-dark" href="#notFound">Not Found</a></li>
                        <li><a class="link-dark" href="#notValid">Not Valid</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
    @push('script')
        <script type="text/javascript">
            const jsonResGetAll = 
`{
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
}`;
            const jsonResGetSingle =
`{
  "meta": {
    "request_id": "5504d11a-89f8-4cd8-b718-5e02538c5add",
    "success": true,
    "code": "CDA-S-003",
    "message": "Data Deleted Successfully"
  },
  "data": null
}`;
            const jsonResCreate =
`{
  "meta": {
    "request_id": "ff325861-deb3-47ae-aea1-fc299c6bc7b9",
    "success": true,
    "code": "CDA-S-001",
    "message": "Data Inserted Successfully"
  },
  "data": null
}`;
            const jsonResEdit =
`{
  "meta": {
    "request_id": "afee1673-e721-48ee-b6da-418c2d64201d",
    "success": true,
    "code": "CDA-S-002",
    "message": "Data Updated Successfully"
  },
  "data": null
}`;
            const jsonReqCreate =
`{
    "date": "24-12-2023",
    "name": "watching football",
    "description": "MU VS Liverpol"
}`;
            const jsonReqEdit =
`{
    "date": "24-12-2023",
    "name": "watching tv",
    "description": "watching naruto"
}`;
            const jsonResDelete =
`{
  "meta": {
    "request_id": "5504d11a-89f8-4cd8-b718-5e02538c5add",
    "success": true,
    "code": "CDA-S-003",
    "message": "Data Deleted Successfully"
  },
  "data": null
}`;
            const jsonResAnautorize =
`{
    "meta": {
        "request_id": "6c6a5348-4571-456e-8063-957f9202cdbb",
        "success": false,
        "code": "CDA-A-001",
        "message": "Unauthorized"
    },
    "data": {
        "request": "Unauthorized request"
    }
}`;
            const jsonResNotFound =
`{
  "meta": {
    "request_id": "6bf84d71-ce6f-429e-86b3-52f4db2e1309",
    "success": false,
    "code": "CDA-E-001",
    "message": "Data not found"
  },
  "data": null
}`;
            const jsonResNotValid =
`{
    "meta":
    {
        "request_id": "f7688857-52ba-4f61-ab56-b8c33671911e",
        "success": false,
        "code": "CDA-V-001",
        "message": "Validation Error"
    },
    "data":
    [
        "The date field must be a date after or equal to 30-12-2023."
    ]
}`;
            let daftarIsi = document.querySelectorAll('#TableOfContents ul li a');

            const resetActive = () => {
                daftarIsi.forEach(el => el.classList.remove('active'));
            }
            const toggleActiveDaftarIsi = (el) => {
                resetActive();
                el.target.classList.add('active');
            }
            daftarIsi.forEach(el => {
                el.addEventListener('click', toggleActiveDaftarIsi);
            });
            document.getElementById('resGetAll').innerHTML = jsonResGetAll;
            document.getElementById('resGetSingle').innerHTML = jsonResGetSingle;
            document.getElementById('resCreate').innerHTML = jsonResCreate;
            document.getElementById('resEdit').innerHTML = jsonResEdit;
            document.getElementById('reqCreate').innerHTML = jsonReqCreate;
            document.getElementById('reqEdit').innerHTML = jsonReqEdit;
            document.getElementById('resDelete').innerHTML = jsonResDelete;
            document.getElementById('resAnautorize').innerHTML = jsonResAnautorize;
            document.getElementById('resNotFound').innerHTML = jsonResNotFound;
            document.getElementById('resNotValid').innerHTML = jsonResNotValid;
        </script>
    @endpush
</x-layout.main-sidebar>
