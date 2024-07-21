<x-layout.main-sidebar title="Application | Clients">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="d-flex align-items-center my-3 ">
                    <h4 class="m-0">Your Client Application</h4>
                    <a class="btn btn-sm btn-primary px-3 mx-3" href="{{ route('page.app.createClient') }}">Create New App
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover" id="tbAppClient">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($listClientApp as $key => $appClient)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td class="text-start">{{ $appClient->name }}</td>
                                    <td class="text-start">{{ $appClient->description }}</td>
                                    <td class="text-start">{{ $appClient->created_at }}</td>
                                    <td>
                                        <a class="btn btn-outline-primary btn-sm" type="button"
                                            href="{{ route('page.app.editClient', ['id' => $appClient->id]) }}">Edit</a>
                                        <form method="post" name="formDeleteMenuAccess"
                                            action="{{ route('do.app.deleteClient', ['id' => $uma->id]) }}">
                                            @csrf
                                            <button class="btn btn-outline-danger btn-sm" type="submit">Delete</button>
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
    @push('script')
        <script type="text/javascript"></script>
    @endpush
</x-layout.main-sidebar>
