<x-layout.main-sidebar title="Admin | User">
    <div class="row mt-3">
        <div class="col">
            <div class="card shadow">
                <div class="card-header">
                    <h4 class="m-0">Resource User Api</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive" style="max-height: 70vh">
                        <table class="table table-sm table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-nowrap pe-3">#</th>
                                    <th scope="col" class="text-nowrap pe-3">ID</th>
                                    <th scope="col" class="text-nowrap pe-3">Name</th>
                                    <th scope="col" class="text-nowrap pe-3">Username</th>
                                    <th scope="col" class="text-nowrap pe-3">Email</th>
                                    <th scope="col" class="text-nowrap pe-3">Email Verify At</th>
                                    <th scope="col" class="text-nowrap pe-3">Role Code</th>
                                    <th scope="col" class="text-nowrap pe-3">Created At</th>
                                    <th scope="col" class="text-nowrap pe-3">Updated At</th>
                                    <th scope="col" class="text-nowrap pe-3">Action</th>
                                </tr>
                            </thead>
                            <tbody id="bodyTb">
                                @forelse ($users as $u)
                                    <tr>
                                        <th scope="row">{{ $loop->index + 1 }}</th>
                                        <td class="text-start text-nowrap pe-3">{{ $u->id }}</td>
                                        <td class="text-start text-nowrap pe-3">{{ $u->name }}</td>
                                        <td class="text-start text-nowrap pe-3">{{ $u->username }}</td>
                                        <td class="text-start text-nowrap pe-3">{{ $u->email }}</td>
                                        <td class="text-start text-nowrap pe-3">{{ $u->email_verified_at }}</td>
                                        <td class="text-start text-nowrap pe-3">{{ $u->role_code }}</td>
                                        <td class="text-start text-nowrap pe-3">{{ $u->created_at }}</td>
                                        <td class="text-start text-nowrap pe-3">{{ $u->updated_at }}</td>
                                        <td class="text-start text-nowrap pe-3">
                                            <a href="" class="btn btn-primary btn-sm">Verify Email</a>
                                            <a href="" class="btn btn-primary btn-sm">Delete</a>
                                            <a href="" class="btn btn-primary btn-sm">Reset Password</a>
                                        </td>
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
    </div>
</x-layout.main-sidebar>
