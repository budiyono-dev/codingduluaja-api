<x-layout.main-sidebar title="Admin | User">
    <div class="row mt-3">
        <div class="col">
            <div class="card shadow">
                <div class="card-header d-flex gap-3 justify-content-between">
                    <h4 class="m-0">User Management</h4>
                    <div class="d-flex gap-3">
                        <form action="{{  route('admin.user.verify')  }}" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" id="txtUidV">
                            <button type="submit" id="btnEmail" href="" class="btn btn-primary btn-sm" disabled>Verify Email</button>
                        </form>
                        <form action="{{  route('admin.user.reset')  }}" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" id="txtUidR">
                            <button type="submit" id="btnReset" href="" class="btn btn-primary btn-sm" disabled>Reset Password</button>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
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
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $u)
                                <tr class="row-user" onclick="chooseUser(this, {{ $u->id  }})">
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td class="text-start text-nowrap pe-3">{{ $u->id }}</td>
                                    <td class="text-start text-nowrap pe-3">{{ $u->name }}</td>
                                    <td class="text-start text-nowrap pe-3">{{ $u->username }}</td>
                                    <td class="text-start text-nowrap pe-3">{{ $u->email }}</td>
                                    <td class="text-start text-nowrap pe-3">{{ $u->email_verified_at }}</td>
                                    <td class="text-start text-nowrap pe-3">{{ $u->role_code }}</td>
                                    <td class="text-start text-nowrap pe-3">{{ $u->created_at }}</td>
                                    <td class="text-start text-nowrap pe-3">{{ $u->updated_at }}</td>
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
    @push('script')
    <script>
        const token = {!! json_encode(session('pwd')) !!};
        if (token) {
            Swal.fire({
                title: "Your New Password",
                text: token,
                icon: "info",
                confirmButtonText: "Copy",
                showCloseButton: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    navigator.clipboard.writeText(token);
                    showSimpleToast('Copied to clipboard', 'success');
                }
            });
        }

        function chooseUser(el, id) {
            document.querySelectorAll('.row-user').forEach(e => e.classList.remove('table-active'));
            el.classList.add('table-active');
            document.getElementById('btnEmail').disabled=false;
            document.getElementById('btnReset').disabled=false;
            document.getElementById('txtUidR').value = id;
            document.getElementById('txtUidV').value = id;
        }
    </script>
    @endpush
</x-layout.main-sidebar>
