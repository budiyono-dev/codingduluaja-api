<x-layout.main-sidebar title="Resource | {{ $title }}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="pt-4 pb-4 text-center">
                    <h4>Resource {{ $title }}</h4>
                </div>
                <div class="row justify-content-evenly">
                    <div class="col-7 ">
                        <div class="table-responsive" style="max-height: 70vh">
                            <table class="table table-sm  table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        {{-- <th scope="col">Id</th> --}}
                                        <th scope="col">Kode</th>
                                        <th scope="col">Nama</th>
                                        @if (count($actionTurunan) > 0)
                                            <th scope="col">Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody id="bodyTb">
                                    @forelse ($listWilayah as $key => $w)
                                        <tr>
                                            <th scope="row">{{ 1 + $key }}</th>
                                            {{-- <td class="text-start">{{ $p->id }}</td> --}}
                                            <td class="text-start">{{ $w->kode }}</td>
                                            <td class="text-start">{{ $w->nama }}</td>
                                            @if (count($actionTurunan) > 0)
                                                <td class="text-start">
                                                    <form action="{{ $actionTurunan['url'] }}">
                                                        {!! $actionTurunan['search'] !!}
                                                        {!! str_replace(':id', $w->id, $actionTurunan['param']) !!}
                                                        <x-button type="submit" class="btn-sm btn-outline-primary ">
                                                            {{ $actionTurunan['text'] }}
                                                        </x-button>

                                                    </form>
                                                </td>
                                            @endif
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4">No Data....</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-5">
                        <input type="text" class="form-control mb-3" id="txtFilterTable" name="filterTable"
                            placeholder="search key word in table">
                        <form name="formSearchWilayah" id="formSearchWilayah" action=""
                            method="post" autocomplete="off">
                            <div class="card p-3">
                                <div class="text-center p-1">
                                    <h5>Cek Kode {{ $title }}</h5>
                                </div>
                                <select class="form-select mb-3" name="sel_search_by" id="selSearchBy">
                                    <option selected value="">-- Search --</option>
                                    <option value="kabupaten">Kabupaten</option>
                                    <option value="kecamatan">Kecamatan</option>
                                    <option value="desa">Desa</option>
                                </select>
                                <input type="text" class="form-control mb-3" id="txtCode" name="kode"
                                    placeholder="kode ">
                                <x-button type="submit" class="btn-sm btn-outline-primary px-3">
                                    Search
                                </x-button>
                            </div>
                        </form>
                        <div class="card p-3 mt-2">
                            <div class="text-center p-1">
                                <h5>Hasil</h5>
                            </div>
                            <p id="wilDes" class="text-center"></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('script')
        <script type="text/javascript">
            let urlFind = {!! json_encode($url_find) !!};
            document.getElementById('txtFilterTable').value = '';
            const searchInTable = () => {
                const filter = document.getElementById('txtFilterTable').value;
                console.log('search', filter);
                const tBody = document.getElementById('bodyTb');
                let tr = tBody.getElementsByTagName('tr');
                if (filter !== '') {
                    for (i = 0; i < tr.length; i++) {
                        var rowContent = tr[i].textContent;
                        rowContent = rowContent.replace(/[\s]+/g, ' ');
                        console.log(rowContent, rowContent.toUpperCase().includes(filter.toUpperCase()));

                        if (rowContent) {
                            if (rowContent.toUpperCase().includes(filter.toUpperCase())) {
                                tr[i].classList.remove('d-none');
                            } else {
                                tr[i].classList.add('d-none');
                            }
                        }

                    }
                } else {
                    for (i = 0; i < tr.length; i++) {
                        tr[i].classList.remove('d-none');
                    }
                }

            }
            const changeSearchBy = () => {
                const searchBy = document.getElementById('selSearchBy').value;
                const txtCode = document.getElementById('txtCode');
                txtCode.value = '';
                txtCode.placeholder = `kode ${searchBy}`;
            }
            const searchWilayah = async (e) => {
                e.preventDefault();
                const wil = document.getElementById('selSearchBy').value;
                const code = document.getElementById('txtCode').value;
                console.log(wil, code, wil&&code, code !== '', wil !== '' && code !== '');
                if (wil !== '' && code !== '') {
                    const res = await fetch(urlFind.replace(':wil', wil).replace(':id', code));
                    if (res.ok) {
                        const jsonRes = await res.json();
                        const data = jsonRes.data;
                        console.log(data);
                        document.getElementById('wilDes').innerHTML = `${wil.toUpperCase()} <b>${data.nama}</b>, KODE <b>${data.kode}</b>`;
                        // document.getElementById('wilId').innerText = data.id;
                        // document.getElementById('wilName').innerText = data.nama;
                        // document.getElementById('wilCode').innerText = data.kode;
                    } else {
                        document.getElementById('wilDes').innerHTML = `<b>Data Tidak Ditemukan</b>`;
                    }
                } else {
                    showSimpleToast('not found');
                }

            }
            document.getElementById('txtFilterTable').addEventListener('keyup', searchInTable);
            document.getElementById('selSearchBy').addEventListener('change', changeSearchBy);
            document.getElementById('formSearchWilayah').addEventListener('submit', searchWilayah);
        </script>
    @endpush
</x-layout.main-sidebar>
