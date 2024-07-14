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
                                    {{-- @forelse ($menuAccess as $key => $uma)
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
                                    @endforelse --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                        <div class="table-responsive ">
                            <table class="table table-sm  table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Menu Parent</th>
                                        <th scope="col" class="text-center">Enabled</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr id="loadingMenuParent">
                                        <td colspan="3" class="text-center">
                                            <div class="spinner-border spinner-border-sm" role="status" id="loadingSpinner">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                        </td>
                                    </tr>
                                    @forelse ($menuParent as $key => $p)
                                        <tr onclick="show({{ $p }})">
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td class="text-start">{{ __($p->name) }}</td>
                                            <td class="text-center">
                                                <input class="form-check-input border-secondary" type="checkbox">
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
                    <div class="col">
                        <div class="table-responsive ">
                            <table class="table table-sm  table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Menu Item</th>
                                        <th scope="col" class="text-center">Enabled</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr id="loadingMenuItem">
                                        <td colspan="3" class="text-center">
                                            <div class="spinner-border spinner-border-sm" role="status" id="loadingSpinner">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                        </td>
                                    </tr>
                                    @forelse ($menuItem as $key => $it)
                                        <tr onclick="show({{ $it }})" class="d-none">
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td class="text-start">{{ __($it->name) }}</td>
                                            <td class="text-center">
                                                <input class="form-check-input border-secondary" type="checkbox">
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
