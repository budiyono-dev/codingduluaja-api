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
            <p>Contoh request body:</p>
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
            document.getElementById('resGetAll').innerHTML = JSON.stringify({!! __(__('responsejson.todolist.resGetAll')) !!}, null, 4);;
            document.getElementById('resGetSingle').innerHTML = JSON.stringify({!! __(__('responsejson.todolist.resGetSingle')) !!}, null, 4);;
            document.getElementById('resCreate').innerHTML = JSON.stringify({!! __(__('responsejson.todolist.resCreate')) !!}, null, 4);;
            document.getElementById('reqCreate').innerHTML = JSON.stringify({!! __(__('responsejson.todolist.reqCreate')) !!}, null, 4);;
            document.getElementById('resEdit').innerHTML = JSON.stringify({!! __(__('responsejson.todolist.resEdit')) !!}, null, 4);;
            document.getElementById('reqEdit').innerHTML = JSON.stringify({!! __(__('responsejson.todolist.reqEdit')) !!}, null, 4);;
            document.getElementById('resDelete').innerHTML = JSON.stringify({!! __(__('responsejson.todolist.resDelete')) !!}, null, 4);;
            document.getElementById('resAnautorize').innerHTML = JSON.stringify({!! __(__('responsejson.error.unauthorized')) !!}, null, 4);;
            document.getElementById('resNotFound').innerHTML = JSON.stringify({!! __(__('responsejson.error.notFound')) !!}, null, 4);;
            document.getElementById('resNotValid').innerHTML = JSON.stringify({!! __(__('responsejson.todolist.resNotValid')) !!}, null, 4);;
        </script>
    @endpush
</x-layout.main-sidebar>
