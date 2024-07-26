<x-layout.main-sidebar title="Application | Client">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card mt-3">
                    <div class="d-flex align-items-center card-header">
                        <h4 class="m-0">Client Application</h4>
                        <a class="btn btn-sm btn-primary px-3 mx-3"
                           href="{{ route('app.client.create') }}">Create New App
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="tbAppClient">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Created At</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($listClientApp as $key => $appClient)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td class="text-start">{{ $appClient->name }}</td>
                                        <td class="text-start">{{ $appClient->description }}</td>
                                        <td class="text-start">{{ $appClient->created_at }}</td>
                                        <td class="text-center d-flex justify-content-evenly align-items-center">
                                            <a class="btn btn-primary btn-sm" type="button"
                                               href="{{ route('app.client.edit', ['id' => $appClient->id]) }}">Edit</a>
                                            <form method="post"
                                                  action="{{ route('app.client.doDelete') }}" name="formDeleteAppClient">
                                                @csrf
                                                <input type="hidden" name="txtId" value="{{$appClient->id}}">
                                                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                            </form>
                                        </td>
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
    </div>
    @push('script')
    <script>
        const formDelete = document.querySelectorAll('form[name="formDeleteAppClient"]');
        if (formDelete) {
            for (let f of formDelete) {
                f.addEventListener('submit', (e) => {
                    e.preventDefault();
                    swal2(() => f.submit());
                    return false;
                });
            }
        }
    </script>
    @endpush
</x-layout.main-sidebar>
