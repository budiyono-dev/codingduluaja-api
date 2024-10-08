<x-layout.main-sidebar title="Admin | Menu Access">
    <div class="row justify-content-center mt-3">
        <div class="col">
            <div class="card shadow">
                <div class="card-header">
                    <div class="m-0">
                        <h4 class="m-0">User Role Menu Access</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive ">
                        <table class="table table-sm table-hover table-striped">
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
                                        <td class="text-start ">{{ $uma->code }}</td>
                                        <td class="text-start">
                                            @if ($uma->code === 'ADMIN')
                                                <select class="form-select form-select-sm" value="{{ $uma->name }}"
                                                    disabled>
                                                    <option value="{{ $maNamesAdmin }}">{{ $maNamesAdmin }}</option>
                                                </select>
                                            @else
                                                <select class="form-select form-select-sm"
                                                    onchange="changeMA(this, '{{ $uma->code }}')">
                                                    
                                                    <option value="" @selected($uma->name === '')>Select Menu Access</option>
                                                    @foreach ($maNames as $mam)
                                                        <option value="{{ $mam }}" @selected($uma->name === $mam)>{{ $mam }}</option>
                                                    @endforeach
                                                </select>
                                            @endif
                                        </td>
                                        <td class="text-center d-flex justify-content-evenly align-items-center">
                                            @if ($uma->code === 'ADMIN')
                                                <button class="btn btn-primary btn-sm" type="submit"
                                                    disabled>Save</button>
                                            @else
                                                <form action="{{ route('admin.menuAccess.user',absolute:false) }}" method="POST"
                                                    name="formChangeMenuAccess">
                                                    @csrf
                                                    <input type="hidden" name="txtRoleCode" value="{{ $uma->code }}">
                                                    <input type="hidden" name="txtMenuAccess" value="{{ $uma->name }}"
                                                        id="{{ 'txtMenuAccess' . $uma->code }}">
                                                    <button class="btn btn-primary btn-sm"
                                                        type="submit">Save</button>
                                                </form>
                                            @endif
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
            <div class="card shadow">
                <div class="card-header d-flex align-items-center">
                    <h4 class="m-0">Menu Access</h4>
                    <a class="btn btn-primary btn-sm mx-3 px-3" href="{{ route('admin.menuAccess.create',absolute:false) }}">Add</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
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
                                            <a class="btn btn-primary btn-sm" type="button"
                                                href="{{ route('admin.menuAccess.edit', ['id' => $uma->id], absolute:false) }}">Edit</a>
                                            @if ($uma->id !== 1)
                                                <form method="post" name="formDeleteMenuAccess"
                                                    action="{{ route('admin.menuAccess.doDelete', ['id' => $uma->id], absolute:false) }}">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$uma->id}}">
                                                    <button class="btn btn-danger btn-sm"
                                                        type="submit">Delete</button>
                                                </form>
                                            @endif
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
        const formDelete = document.querySelectorAll('form[name="formDeleteMenuAccess"]');
        if (formDelete) {
            for (let f of formDelete) {
                f.addEventListener('submit', (e) => {
                    e.preventDefault();
                    swal2(() => f.submit());
                    return false;
                });
            }
        }

        function changeMA(el, sel) {
            document.getElementById('txtMenuAccess' + sel).value = el.value;
        }
    </script>
    @endpush
</x-layout.main-sidebar>
