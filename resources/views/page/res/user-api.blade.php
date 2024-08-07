<x-layout.main-sidebar title="Resource | User Api">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card mt-3">
                <div class="card-header d-flex">
                    <h4 class="m-0">Resource User Api</h4>
                    <a class="btn btn-sm btn-primary px-3 mx-3"
                       href="{{ route('res.userApi.pageDummy') }}">Add Dummy
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive" style="max-height: 70vh">
                        <table class="table table-sm table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-nowrap pe-3">#</th>
                                    <th scope="col" class="text-nowrap pe-3">Name</th>
                                    <th scope="col" class="text-nowrap pe-3">Nik</th>
                                    <th scope="col" class="text-nowrap pe-3">Phone</th>
                                    <th scope="col" class="text-nowrap pe-3">Email</th>
                                    <th scope="col" class="text-nowrap pe-3">Created At</th>
                                    <th scope="col" class="text-nowrap pe-3">Updated At</th>
                                    <th scope="col" class="text-nowrap pe-3">Action</th>
                                </tr>
                            </thead>
                            <tbody id="bodyTb">
                                @forelse ($user as $key => $u)
                                    <tr>
                                        <th scope="row">{{ 1 + $key }}</th>
                                        <td class="text-start text-nowrap pe-3">{{ $u->name }}</td>
                                        <td class="text-start text-nowrap pe-3">{{ $u->nik }}</td>
                                        <td class="text-start text-nowrap pe-3">{{ $u->phone }}</td>
                                        <td class="text-start text-nowrap pe-3">{{ $u->email }}</td>
                                        <td class="text-start text-nowrap pe-3">{{ $u->created_at }}</td>
                                        <td class="text-start text-nowrap pe-3">{{ $u->updated_at }}</td>
                                        <td class="text-start text-nowrap pe-3"><a href="{{ route('res.userApi.detail', ['id'=> $u->id]) }}" class="btn btn-sm btn-primary">Detail</a></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="13">No Data....</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div
    @push('script')
    <script type="text/javascript">
        
    </script>
    @endpush
</x-layout.main-sidebar>
