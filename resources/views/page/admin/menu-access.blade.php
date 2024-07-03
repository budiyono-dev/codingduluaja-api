<x-layout.main-sidebar title="Admin | Menu Access">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="pt-4 pb-4 text-end">
                    <button type="button" class="btn btn-primary">Add Menu Access</button>
                    <button type="button" class="btn btn-primary">Save Update</button>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($userMenuAccess as $key => $uma)
                                        <tr onclick="showMenuAccess({{ $uma->id }})">
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td class="text-start">{{ $uma->role_code }}</td>
                                            <td class="text-start">{{ $uma->menu_access_id }}</td>
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
                                        <th scope="col">Menu Parent</th>
                                        <th scope="col" class="text-center">Enabled</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr >
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
                                        <th scope="col" class="text-center">
                                            Enabled
                                            <input class="form-check-input border-secondary" type="checkbox"
                                                id="">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr >
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
        </div>
    </div>
    @push('script')
        <script type="text/javascript">
            function showMenuAccess() {
                console.log("show menu access");
            }
        </script>
    @endpush
</x-layout.main-sidebar>
