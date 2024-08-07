<x-layout.main-sidebar title="Application | Resource">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card mt-3">
                <div class="d-flex align-items-center card-header">
                    <h4 class="m-0">Resources Application</h4>
                    <a class="btn btn-sm btn-primary px-3 mx-3" href="{{ route('app.resource.create') }}">
                        Add New Resource
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">#</th>
                                    <th scope="col">Resource Name</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col" class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($listResource as $key => $resource)
                                    <tr>
                                        <td class="text-center">{{ $key + 1 }}</td>
                                        <td class="text-start">{{ $resource->masterResource->name }}</td>
                                        <td class="text-start">{{ $resource->created_at }}</td>
                                        <td class="text-center d-flex gap-3 justify-content-center align-items-center"
                                            style="border-left: none;">
                                            <form method="post" name="formDeleteAppResource"
                                                action="{{ route('app.resource.doDelete', ['id' => $resource->id]) }}">
                                                @csrf
                                                <input type="hidden" value="{{ $resource->id }}" name="txtId">
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
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
    @push('script')
    <script>
        const formDelete = document.querySelectorAll('form[name="formDeleteAppResource"]');
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
