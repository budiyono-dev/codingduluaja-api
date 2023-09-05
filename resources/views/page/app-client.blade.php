<x-layout.main-sidebar title="App Clients">
    <div class="row justify-content-md-center">
        <div class="col-8 text-center">
            <h1>App Client Page</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($listAppClient as $key => $appClient)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $appClient->name }}</td>
                            <td>{{ $appClient->created_at }}</td>
                            <td>
                                <button>action</button>
                            </td>
                        </tr>
                    @empty
                        <h5> No data Found </h5>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layout.main-sidebar>
