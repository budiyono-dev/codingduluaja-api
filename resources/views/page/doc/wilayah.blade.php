<x-layout.main-sidebar title="Documentation | {{ $title }}">
    <div class="d-flex f-w">

        <div class="doc-main doc">
            <h1 class="fs-2" id="apiName">{{ $title }} Api</h3>
            <p>{{ $title }} Api merupakan api yang disediakan untuk menampilkan data infomasi wilayah berdasarkan data bps. <b>Disclaimer</b> : data wilayah bisa jadi tidak sesuai, silahkan cek di laman resmi bps</p>
            <h3 class="fs-4" id="listEndpoint">List Endpoint</h3>
            <p>Berikut list endpoint yang disediakan untuk {{ $title }} Api, pastikan menambahkan token kedalam <strong>Header</strong> untuk setiap request. <code>X-Authorization: Bearer @{{your_token}}</code></p>

            <h3 class="fs-6 fw-bold" id="getListProvinsi">Get List Provinsi</h3>
            <p>Menampilkan semua data provinsi, method : <code>GET</code>, endpoint : <code>{{$endpoint}}/provinsi</code>, contoh response :</p>
            <pre class="card" ><code class="language-json" id="resListProvinsi"></code></pre>

            <h3 class="fs-6 fw-bold" id="getDetailProvinsi">Get Detail Provinsi</h3>
            <p>Menampilkan data provinsi berdasarkan id, method : <code>GET</code>, endpoint : <code>{{$endpoint}}/provinsi/{id}</code>, contoh response :</p>
            <pre class="card" ><code class="language-json" id="resDetailProvinsi"></code></pre>

            <h3 class="fs-6 fw-bold" id="getListKabupaten">Get List Kabupaten</h3>
            <p>Menampilkan semua data kabupaten dari provinsi tertentu, method : <code>GET</code>, endpoint : <code>{{$endpoint}}/kabupaten</code></p>
            <p>Request parameter :</p>
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
                        <td>provinsi_id</td>
                        <td>String</td>
                        <td>-</td>
                        <td>Y</td>
                        <td>provinsi id</td>
                    </tr>
                </tbody>
            </table>
            <p>contoh response :</p>
            <pre class="card" ><code class="language-json" id="resListKabupaten"></code></pre>
            

            <h3 class="fs-6 fw-bold" id="getDetailKabupaten">Get Detail Kabupaten</h3>
            <p>Menampilkan detail kabupaten berdasarkan id, method : <code>GET</code>, endpoint : <code>{{$endpoint}}/kabupaten/{id}</code>, contoh response :</p>
            <pre class="card" ><code class="language-json" id="resDetailKabupaten"></code></pre>

            <h3 class="fs-6 fw-bold" id="getListKecamatan">Get List Kecamatan</h3>
            <p>Menampilkan semua data kecamatan dari kabupaten tertentu, method : <code>GET</code>, endpoint : <code>{{$endpoint}}/kecamatan</code></p>
            <p>Request parameter :</p>
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
                        <td>kabupaten_id</td>
                        <td>String</td>
                        <td>-</td>
                        <td>Y</td>
                        <td>kabupaten id</td>
                    </tr>
                </tbody>
            </table>
            <p>contoh response :</p>
            <pre class="card" ><code class="language-json" id="resListKecamatan"></code></pre>

            

            <h3 class="fs-6 fw-bold" id="getDetailKecamatan">Get Detail Kecamatan</h3>
            <p>Menampilkan detail kecamatan berdasarkan id, method : <code>GET</code>, endpoint : <code>{{$endpoint}}/kecamatan/{id}</code>, contoh response :</p>
            <pre class="card" ><code class="language-json" id="resDetailKecamatan"></code></pre>

            <h3 class="fs-6 fw-bold" id="getListDesa">Get List Desa</h3>
            <p>Menampilkan semua data desa dari kecamatan tertentu, method : <code>GET</code>, endpoint : <code>{{$endpoint}}/desa</code></p>
            <p>Request parameter :</p>
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
                        <td>kecamatan_id</td>
                        <td>String</td>
                        <td>-</td>
                        <td>Y</td>
                        <td>kecamatan id</td>
                    </tr>
                </tbody>
            </table>
            <p>contoh response :</p>
            <pre class="card" ><code class="language-json" id="resListDesa"></code></pre>

            
            <h3 class="fs-6 fw-bold" id="getDetailDesa">Get Detail Desa</h3>
            <p>Menampilkan detail desa berdasarkan id, method : <code>GET</code>, endpoint : <code>{{$endpoint}}/desa/{id}</code>, contoh response :</p>
            <pre class="card" ><code class="language-json" id="resDetailDesa"></code></pre>

            <h3 class="fs-4" id="listError">Error Example</h3>
            <p>Berikut contoh error response :</p>

            <h3 class="fs-6 fw-bold" id="unAuthorize">Unauthorized</h3>
            <pre class="card" ><code class="language-json" id="resAnautorize"></code></pre>

            <h3 class="fs-6 fw-bold" id="notFound">Not Found</h3>
            <pre class="card" ><code class="language-json" id="resNotFound"></code></pre>

        </div>
        <nav id="TableOfContents" class="nav-doc border-end doc">
            <ul>
                <li><a class="link-dark" href="#apiName">{{ $title }} Api</a></li>
                <li><a class="link-dark" href="#listEndpoint">Endpoint List</a>
                    <ul>
                        <li><a class="link-dark" href="#getListProvinsi">Get List Provinsi</a></li>
                        <li><a class="link-dark" href="#getDetailProvinsi">Get Detail Provinsi</a></li>
                        <li><a class="link-dark" href="#getListKabupaten">Get List Kabupaten</a></li>
                        <li><a class="link-dark" href="#getDetailKabupaten">Get Detail Kabupaten</a></li>
                        <li><a class="link-dark" href="#getListKecamatan">Get List Kecamatan</a></li>
                        <li><a class="link-dark" href="#getDetailKecamatan">Get Detail Kecamatan</a></li>
                        <li><a class="link-dark" href="#getListDesa">Get List Desa</a></li>
                        <li><a class="link-dark" href="#getDetailDesa">Get Detail Desa</a></li>
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
            const jr = {!! json_encode($jres) !!};
            console.table(jr);
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
            document.getElementById('resListProvinsi').innerHTML = formatJson(jr.listProvinsi);
            document.getElementById('resDetailProvinsi').innerHTML = formatJson(jr.detailProvinsi);
            document.getElementById('resListKabupaten').innerHTML = formatJson(jr.listKabupaten);
            document.getElementById('resDetailKabupaten').innerHTML = formatJson(jr.detailKabupaten);
            document.getElementById('resListKecamatan').innerHTML = formatJson(jr.listKecamatan);
            document.getElementById('resDetailKecamatan').innerHTML = formatJson(jr.detailKecamatan);
            document.getElementById('resListDesa').innerHTML = formatJson(jr.listDesa);
            document.getElementById('resDetailDesa').innerHTML = formatJson(jr.detailDesa);
            
            document.getElementById('resAnautorize').innerHTML = JSON.stringify({!! __(__('res.error.unauthorized')) !!}, null, 4);
            document.getElementById('resNotFound').innerHTML = JSON.stringify({!! __(__('res.error.notFound')) !!}, null, 4);
        </script>
    @endpush
</x-layout.main-sidebar>
