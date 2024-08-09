<x-layout.main-sidebar title="Documentation | Todolist">
      <div class="row">
        <div class="col-3 border-end">
            <ul id="navbar-example3" style="list-style: none" class="mt-3">
                <li><a class="link-body-emphasis d-block py-1 px-2" href="#item-2-1">Get All Todolist</a></li>
                <li><a class="link-body-emphasis d-block py-1 px-2" href="#item-2-2">Get Single Todolist</a></li>
                <li><a class="link-body-emphasis d-block py-1 px-2" href="#item-2-3">Create Todolistt</a></li>
                <li><a class="link-body-emphasis d-block py-1 px-2" href="#item-2-4">Edit Todolist</a></li>
                <li><a class="link-body-emphasis d-block py-1 px-2" href="#item-2-5">Delete Todolist</a></li>
            </ul>
        </div>
        <div class="col-9">
          <div style="height: 90vh; overflow-y: scroll;" data-bs-spy="scroll" data-bs-target="#navbar-example3" data-bs-smooth-scroll="true" class="scrollspy-example-2" tabindex="0">
            <div id="item-1">
                <h1>Todolist Api</h1>
                <p>Api Todolist merupakan api yang disediakan untuk menyimpan task todo pada tanggal tertentu</p>
            </div>
            <div id="item-2">
                <h2 id="listEndpoint">Endpoint</h2>
            </div>
            <div id="item-2-1">
                <h3 class="my-3">Get All Todolist</h3>
                <table class="table table-sm table-responsive table-hover table-bordered table-striped">
                    <thead>
                        <tr>
                            <th colspan="2">Spesification</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Description</td>
                            <td>Get All Todolist</td>
                        </tr>
                        <tr>
                            <td>Method</td>
                            <td>GET</td>
                        </tr>
                        <tr>
                            <td>URL</td>
                            <td><code>{{config('app.url')}}/api/todolist</code></td>
                        </tr>
                        <tr>
                            <td>Content-Type</td>
                            <td>application/json</td>
                        </tr>
                        <tr>
                            <td>Security</td>
                            <td>header token</td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-sm table-responsive table-hover table-bordered table-striped">
                    <thead>
                        <tr>
                            <th colspan="2">Request Header</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Authorization</td>
                            <td><code>@{{token}}</code></td>
                        </tr>
                        <tr>
                            <td>Accept</td>
                            <td>application/json</td>
                        </tr>
                    </tbody>
                </table>
                <div class="card">
                    <div class="card-header">Example Response</div>
                    <div class="card-body bg-body-secondary">
                        <pre class="p-2"><code>{{__('doc/todo.getAll')}}</code></pre>
                    </div>
                </div>
            </div>
            <div id="item-2-1">
                <h3 class="my-3">Get Detail Todolist</h3>
                <table class="table table-sm table-responsive table-hover table-bordered table-striped">
                    <thead>
                        <tr>
                            <th colspan="2">Spesification</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Description</td>
                            <td>Get Detail Todolist</td>
                        </tr>
                        <tr>
                            <td>Method</td>
                            <td>GET</td>
                        </tr>
                        <tr>
                            <td>URL</td>
                            <td><code>{{config('app.url')}}/api/todolist/{id}</code></td>
                        </tr>
                        <tr>
                            <td>Content-Type</td>
                            <td>application/json</td>
                        </tr>
                        <tr>
                            <td>Security</td>
                            <td>header token</td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-sm table-responsive table-hover table-bordered table-striped">
                    <thead>
                        <tr>
                            <th colspan="2">Request Header</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Authorization</td>
                            <td><code>@{{token}}</code></td>
                        </tr>
                        <tr>
                            <td>Accept</td>
                            <td>application/json</td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-sm table-responsive table-hover table-bordered table-striped">
                    <thead>
                        <tr>
                            <th colspan="2">Parameter</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>id</td>
                            <td>id todolist</td>
                        </tr>
                    </tbody>
                </table>
                <div class="card">
                    <div class="card-header">Example Response</div>
                    <div class="card-body bg-body-secondary">
                        <pre class="p-2"><code>{{__('doc/todo.detail')}}</code></pre>
                    </div>
                </div>
            </div>
            <div id="item-2-1">
                <h3 class="mt-5 mb-3"># Create Todolist</h3>
                <h4 class="my-3">## Specification</h3>
                <table class="table table-sm table-responsive table-hover table-bordered table-striped">
                    <thead>
                        <tr>
                            <th colspan="2">Specification</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Description</td>
                            <td>Create Todolist</td>
                        </tr>
                        <tr>
                            <td>Method</td>
                            <td>POST</td>
                        </tr>
                        <tr>
                            <td>URL</td>
                            <td><code>{{config('app.url')}}/api/todolist</code></td>
                        </tr>
                        <tr>
                            <td>Content-Type</td>
                            <td>application/json</td>
                        </tr>
                        <tr>
                            <td>Security</td>
                            <td>header token</td>
                        </tr>
                    </tbody>
                </table>
                <h4 class="my-3">## Request Header</h4>
                <table class="table table-sm table-responsive table-hover table-bordered table-striped">
                    <thead>
                        <tr><th>Name</th><th>Value</th></tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Authorization</td>
                            <td><code>@{{token}}</code></td>
                        </tr>
                        <tr>
                            <td>Accept</td>
                            <td>application/json</td>
                        </tr>
                    </tbody>
                </table>
                <h4 class="my-3">## Request Body</h4>
                <table class="table table-sm table-responsive table-hover table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Field</th>
                            <th>Type</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>id</td>
                            <td>id todolist</td>
                        </tr>
                    </tbody>
                </table>
                <div class="card">
                    <div class="card-header">Example Response</div>
                    <div class="card-body bg-body-secondary">
                        <pre class="p-2"><code>{{__('doc/todo.detail')}}</code></pre>
                    </div>
                </div>
            </div>
            <div id="item-2">
              <h4>Item 2</h4>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa neque quibusdam nisi reiciendis, provident soluta, saepe fugit exercitationem nemo non veniam illo, inventore doloremque eligendi eos veritatis recusandae est maxime!</p>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa neque quibusdam nisi reiciendis, provident soluta, saepe fugit exercitationem nemo non veniam illo, inventore doloremque eligendi eos veritatis recusandae est maxime!</p>
            </div>
            <div id="item-3">
              <h4>Item 3</h4>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa neque quibusdam nisi reiciendis, provident soluta, saepe fugit exercitationem nemo non veniam illo, inventore doloremque eligendi eos veritatis recusandae est maxime!</p>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa neque quibusdam nisi reiciendis, provident soluta, saepe fugit exercitationem nemo non veniam illo, inventore doloremque eligendi eos veritatis recusandae est maxime!</p>
            </div>
            <div id="item-3-1">
              <h5>Item 3-1</h5>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa neque quibusdam nisi reiciendis, provident soluta, saepe fugit exercitationem nemo non veniam illo, inventore doloremque eligendi eos veritatis recusandae est maxime!</p>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa neque quibusdam nisi reiciendis, provident soluta, saepe fugit exercitationem nemo non veniam illo, inventore doloremque eligendi eos veritatis recusandae est maxime!</p>
            </div>
            <div id="item-3-2">
              <h5>Item 3-2</h5>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa neque quibusdam nisi reiciendis, provident soluta, saepe fugit exercitationem nemo non veniam illo, inventore doloremque eligendi eos veritatis recusandae est maxime!</p>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa neque quibusdam nisi reiciendis, provident soluta, saepe fugit exercitationem nemo non veniam illo, inventore doloremque eligendi eos veritatis recusandae est maxime!</p>
            </div>
          </div>
        </div>
      </div>
    {{-- <div class="row">
        <div class="col-lg-2 border-end" >
            <ul id="navbar-example3">
                <li><a class="link-dark" href="#judul">Todolist Api</a></li>
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
        </div>
        <div class="col">
            <div data-bs-spy="scroll" data-bs-target="#navbar-example3" data-bs-smooth-scroll="true" class="scrollspy-example-2" tabindex="0">
                <div id="judul">
                    <h1>Todolist Api</h1>
                    <p>Api Todolist merupakan api yang disediakan untuk menyimpan task todo pada tanggal tertentu</p>
                </div>
                <!-- list endpoint-->
                <section>
                    <h2 id="listEndpoint">Endpoint</h2>
                    <div id="getAll">
                        <h3>Get All Todolist</h3>
                        <table class="table table-sm table-responsive table-hover table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Properties</th>
                                    <th>Value</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Description</td>
                                    <td>Get All Todolist</td>
                                </tr>
                                <tr>
                                    <td>Method</td>
                                    <td>GET</td>
                                </tr>
                                <tr>
                                    <td>URL</td>
                                    <td><code>{{config('app.url')}}/api/todolist</code></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>
                <!-- error-->
                <div class="doc-main doc">
                
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
        </div>
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
            document.getElementById('resGetAll').innerHTML = JSON.stringify({!! __(__('res.todolist.resGetAll')) !!}, null, 4);;
            document.getElementById('resGetSingle').innerHTML = JSON.stringify({!! __(__('res.todolist.resGetSingle')) !!}, null, 4);;
            document.getElementById('resCreate').innerHTML = JSON.stringify({!! __(__('res.todolist.resCreate')) !!}, null, 4);;
            document.getElementById('reqCreate').innerHTML = JSON.stringify({!! __(__('res.todolist.reqCreate')) !!}, null, 4);;
            document.getElementById('resEdit').innerHTML = JSON.stringify({!! __(__('res.todolist.resEdit')) !!}, null, 4);;
            document.getElementById('reqEdit').innerHTML = JSON.stringify({!! __(__('res.todolist.reqEdit')) !!}, null, 4);;
            document.getElementById('resDelete').innerHTML = JSON.stringify({!! __(__('res.todolist.resDelete')) !!}, null, 4);;
            document.getElementById('resAnautorize').innerHTML = JSON.stringify({!! __(__('res.error.unauthorized')) !!}, null, 4);;
            document.getElementById('resNotFound').innerHTML = JSON.stringify({!! __(__('res.error.notFound')) !!}, null, 4);;
            document.getElementById('resNotValid').innerHTML = JSON.stringify({!! __(__('res.todolist.resNotValid')) !!}, null, 4);;
        </script>
    @endpush --}}
</x-layout.main-sidebar>
