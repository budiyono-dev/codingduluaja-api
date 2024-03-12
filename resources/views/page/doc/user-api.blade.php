<x-layout.main-sidebar title="Documentation | {{ $title }}">
    <div class="d-flex f-w">

        <div class="doc-main doc">
            <h1 class="fs-2" id="apiName">{{ $title }} Api</h3>
                <p>{{ $title }} Api merupakan api yang disediakan untuk menampilkan data dummy user.</p>
                <h3 class="fs-4" id="listEndpoint">List Endpoint</h3>
                <p>Berikut list endpoint yang disediakan untuk {{ $title }} Api,
                    pastikan menambahkan token kedalam <strong>Header</strong> untuk setiap request.
                    <code>X-Authorization: Bearer @{{ your_token }}</code>
                </p>
                <x-doc.judul id="list" title="Get List User"/>
                <x-doc.table :row="$tprop['userSearchParam']" :head="$tprop['head']"></x-doc.table>

                <p>Menampilkan semua data user, method : <code>GET</code>, endpoint : <code>{{ $endpoint }}</code>,
                    contoh response :
                </p>
                <x-doc.json id="resList"/>

                <x-doc.judul id="detail" title="Get Detail User"/>
                <p>Menampilkan data user berdasarkan id, method : <code>GET</code>, endpoint :
                    <code>{{ $endpoint }}/{id}</code>, contoh response :
                </p>
                <x-doc.json id="resDetail"/>

                <x-doc.judul id="getImage" title="Get User Image"/>
                <p>Menampilkan gambar dari user tertentu, method : <code>GET</code>, endpoint :
                    <code>{{ $endpoint }}/image/{id}</code>, id disini merupakan user id.
                    Response get user image merupakan sebuah gambar
                </p>
                
                <x-doc.judul id="updateImage" title="Update User Image"/>
                <p>Menyunting gambar dari user tertentu, method : <code>PUT</code>, endpoint :
                    <code>{{ $endpoint }}/image/{id}</code>, id disini merupakan user id.
                    Response get user image merupakan sebuah gambar
                </p>
                <p>Request parameter :</p>
                <x-doc.table :row="$tprop['updateImage']" :head="$tprop['head']"></x-doc.table>
                <p>contoh request :</p>
                <x-doc.json id="resUpdateImage"/>

                <x-doc.judul id="delete" title="Delete User"/>
                <p>Menghapus user berdasarkan id, method : <code>DELETE</code>, endpoint :
                    <code>{{ $endpoint }}/{id}</code>, contoh response :
                </p>
                <x-doc.json id="resDelete"/>

                <x-doc.judul id="create" title="Create User"/>
                <p>Menambahkan Data User, method : <code>POST</code>, endpoint :
                    <code>{{ $endpoint }}</code>
                </p>
                <p>Request parameter :</p>
                <x-doc.table :row="$tprop['createUser']" :head="$tprop['head']"></x-doc.table>
                <p>contoh request :</p>
                <x-doc.json id="reqCreate"/>
                <p>contoh response :</p>
                <x-doc.json id="resCreate"/>

                <x-doc.judul id="update" title="Update User"/>
                <p>Menyunting Data User, method : <code>PUT</code>, endpoint :
                    <code>{{ $endpoint }}/{id}</code>
                </p>
                <p>Request parameter :</p>
                <x-doc.table :row="$tprop['createUser']" :head="$tprop['head']"></x-doc.table>
                <p>contoh request :</p>
                <x-doc.json id="reqUpdate"/>
                <p>contoh response :</p>
                <x-doc.json id="resUpdate"/>

                <h3 class="fs-4" id="listError">Error Example</h3>
                <p>Berikut contoh error response :</p>

                <h3 class="fs-6 fw-bold" id="unAuthorize">Unauthorized</h3>
                <pre class="card"><code class="language-json" id="resAnautorize"></code></pre>

                <h3 class="fs-6 fw-bold" id="notFound">Not Found</h3>
                <pre class="card"><code class="language-json" id="resNotFound"></code></pre>

        </div>
        <nav id="TableOfContents" class="nav-doc border-end doc">
            <ul>
                <li><a class="link-dark" href="#apiName">{{ $title }} Api</a></li>
                <li><a class="link-dark" href="#listEndpoint">Endpoint List</a>
                    <ul id="endpoints">
                    </ul>
                </li>
                <li><a class="link-dark" href="#listError">Error Example</a>
                    <ul>
                        <li><a class="link-dark" href="#unAuthorize">Unauthorized</a></li>
                        <li><a class="link-dark" href="#notFound">Not Found</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
    @push('script')
        <script type="text/javascript">
            genLinkDoc();
            const jres = {!! json_encode($jres) !!};
            // console.log(jres);
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
            const formatJson = (stringJson) => {
                return JSON.stringify(JSON.parse(stringJson), null, 4);
            }
            document.getElementById('resList').innerHTML = formatJson(jres.list);
            document.getElementById('resDetail').innerHTML = formatJson(jres.detail);
            document.getElementById('resDelete').innerHTML = formatJson(jres.delete);
            document.getElementById('resCreate').innerHTML = formatJson(jres.create);
            document.getElementById('reqCreate').innerHTML = formatJson(jres.reqCreate);
            document.getElementById('resUpdate').innerHTML = formatJson(jres.update);
            document.getElementById('reqUpdate').innerHTML = formatJson(jres.reqUpdate);
            document.getElementById('resUpdateImage').innerHTML = formatJson(jres.updateImage);

            document.getElementById('resAnautorize').innerHTML = JSON.stringify({!! __(__('res.error.unauthorized')) !!}, null, 4);
            document.getElementById('resNotFound').innerHTML = JSON.stringify({!! __(__('res.error.notFound')) !!}, null, 4);
        </script>
    @endpush
</x-layout.main-sidebar>
