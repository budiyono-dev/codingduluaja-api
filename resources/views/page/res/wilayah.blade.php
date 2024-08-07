<x-layout.main-sidebar title="Resource | {{ $title }}">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header d-flex gap-3">
                    <h4 class="m-0">Resource {{ $title }}</h4>
                    <input type="text"  class="form-control form-control-sm" style="width: 200px" placeholder="keyword" id="txtFilterTable">
                </div>
                <div class="card-body">
                    <div class="table-responsive" style="max-height: 70vh">
                        <table class="table table-sm  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Kode</th>
                                    <th scope="col">Nama</th>
                                    @if (!is_null($action))
                                    <th scope="col">Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody id="bodyTb">
                                @forelse ($listWilayah as $key => $w)
                                    <tr>
                                        <th scope="row">{{ 1 + $key }}</th>
                                        <td class="text-start">{{ $w->kode }}</td>
                                        <td class="text-start">{{ $w->nama }}</td>
                                        @if (!is_null($action))
                                        <td class="text-start">
                                            <a href="{{ str_replace(':id', $w->id, $action) }}"
                                            class="btn btn-primary btn-sm">{{$text}}</a>
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
            </div>
        </div>
    </div>
    @push('script')
    <script type="text/javascript">
        function searchInTable() {
            const filter = document.getElementById('txtFilterTable').value;
            const tBody = document.getElementById('bodyTb');
            let tr = tBody.getElementsByTagName('tr');

            if (filter === '') {
                for (i = 0; i < tr.length; i++) {
                    tr[i].classList.remove('d-none');
                }
                return;
            }

            for (i = 0; i < tr.length; i++) {
                var rowContent = tr[i].textContent;
                rowContent = rowContent.replace(/[\s]+/g, ' ');
                if (!rowContent) continue;

                if (rowContent.toUpperCase().includes(filter.toUpperCase())) {
                    tr[i].classList.remove('d-none');
                } else {
                    tr[i].classList.add('d-none');
                }
            }
        }
        document.getElementById('txtFilterTable').addEventListener('keyup', searchInTable);
    </script>
    @endpush
</x-layout.main-sidebar>
