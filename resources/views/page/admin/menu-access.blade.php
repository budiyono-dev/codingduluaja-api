<x-layout.main-sidebar title="Admin | Menu Access">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="row">
                    <h2 class="my-2 fs-5 fw-bold text-decoration-underline">User Role Menu Access</h2>
                </div>
                <div class="row justify-content-evenly">
                    <div class="col">
                        <div class="table-responsive ">
                            <table class="table table-sm  table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Menu Access</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($userMenuAccess as $key => $uma)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td class="text-start">{{ $uma->code }}</td>
                                            <td class="text-start">{{ $uma->name }}</td>
                                            <td class="text-center d-flex justify-content-evenly align-items-center">
                                                <a class="btn btn-outline-primary btn-sm" type="button">edit</a>
                                                <form method="post" action="">
                                                    @csrf
                                                    <button class="btn btn-outline-danger btn-sm" type="button">delete</button>
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
            <div class="col">
                <div class="row">
                    <h2 class="my-2 fs-5 fw-bold text-decoration-underline">Menu Access</h2>
                </div>
                <div class="table-responsive ">
                    <table class="table table-sm  table-hover table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($menuAccess as $key => $uma)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td class="text-start">{{ $uma->name }}</td>
                                    <td class="text-start">{{ $uma->description }}</td>
                                    <td class="text-center d-flex justify-content-evenly align-items-center">
                                        <a class="btn btn-outline-primary btn-sm" type="button"
                                         href="{{ route('do.admin.editMenuAccess', ['id'=> $uma->id ]) }}">edit</a>
                                        <form method="post" action="">
                                            @csrf
                                            <button class="btn btn-outline-danger btn-sm" type="button">delete</button>
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
</x-layout.main-sidebar>
