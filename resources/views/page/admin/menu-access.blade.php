<x-layout.main-sidebar title="Admin | Menu Access">
    <div class="container">
        <div class="row justify-content-center gx-5">
            <div class="col">
                <div class="d-flex my-3">
                    <h2 class="my-2 fs-5 fw-bold text-decoration-underline">User Role Menu Access</h2>
                </div>
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
                                    <td class="text-start ">{{ $uma->code }}</td>
                                    <td class="text-start">
                                        @if ($uma->code === 'ADMIN')
                                            <select class="form-select form-select-sm" value={{ $uma->name }}
                                                disabled>
                                                <option value={{ $maNamesAdmin }}>{{ $maNamesAdmin }}</option>
                                            </select>
                                        @else
                                            <select class="form-select form-select-sm"
                                                onchange="changeMA(this, '{{ $uma->code }}')">
                                                
                                                <option value="" {{ $uma->name === '' ? 'selected' : '' }} >Select Menu Access</option>
                                                @foreach ($maNames as $mam)
                                                    <option value={{ $mam }} {{ $uma->name === $mam ? 'selected' : '' }}>{{ $mam }}</option>
                                                @endforeach
                                            </select>
                                        @endif
                                    </td>
                                    <td class="text-center d-flex justify-content-evenly align-items-center">
                                        @if ($uma->code === 'ADMIN')
                                            <button class="btn btn-outline-primary btn-sm" type="submit"
                                                disabled>save</button>
                                        @else
                                            <form action={{ route('do.admin.changeUserMenuAccess') }} method="POST"
                                                name="formChangeMenuAccess">
                                                @csrf
                                                <input type="hidden" name="txtRoleCode" value="{{ $uma->code }}">
                                                <input type="hidden" name="txtMenuAccess" value="{{ $uma->name }}"
                                                    id="{{ 'txtMenuAccess' . $uma->code }}">
                                                <button class="btn btn-outline-primary btn-sm"
                                                    type="submit">save</button>
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
            <div class="col-7">
                <div class="d-flex my-3 align-items-center">
                    <h2 class="my-2 fs-5 fw-bold text-decoration-underline">Menu Access</h2>
                    <a class="btn btn-primary btn-sm mx-3 px-3" href={{ route('page.admin.addMenuAccess') }}>add</a>
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
                                            href="{{ route('page.admin.editMenuAccess', ['id' => $uma->id]) }}">edit</a>
                                        @if ($uma->id !== 1)
                                            <form method="post" name="formDeleteMenuAccess"
                                                action={{ route('do.admin.deleteMenuAccess', ['id' => $uma->id]) }}>
                                                @csrf
                                                <button class="btn btn-outline-danger btn-sm"
                                                    type="submit">delete</button>
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
    @push('script')
        <script>
            const formDelete = document.formDeleteMenuAccess;
            if (formDelete) {
                for (let f of formDelete) {
                    f.addEventListener('submit', (e) => {
                        e.preventDefault();
                        console.log(e);
                        swal2(() => f.submit());
                        return false;
                    });
                }
            }

            function changeMA(el, sel) {
                console.log(sel, el.value);
                document.getElementById('txtMenuAccess' + sel).value = el.value;
            }
        </script>
    @endpush
</x-layout.main-sidebar>
