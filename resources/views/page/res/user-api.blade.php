<x-layout.main-sidebar title="Resource | {{ $title }}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="d-flex align-items-center justify-content-between p-3 my-3 ">
                    <h4>Resource {{ $title }}</h4>
                    <x-button type="button" class="btn-sm btn-outline-primary px-3" data-bs-toggle="modal"
                        data-bs-target="#modalGenerateUser">
                        Generate User
                    </x-button>
                </div>
                <div class="row justify-content-evenly">
                    <div class="col">
                        <div class="table-responsive" style="max-height: 70vh">
                            <table class="table table-sm table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-nowrap pe-3">#</th>
                                        <th scope="col" class="text-nowrap pe-3">Name</th>
                                        <th scope="col" class="text-nowrap pe-3">Nik</th>
                                        <th scope="col" class="text-nowrap pe-3">Phone</th>
                                        <th scope="col" class="text-nowrap pe-3">Email</th>
                                        <th scope="col" class="text-nowrap pe-3">Created At</th>
                                        <th scope="col" class="text-nowrap pe-3">Updated At</th>
                                        <th scope="col" class="text-nowrap pe-3">Country</th>
                                        <th scope="col" class="text-nowrap pe-3">State</th>
                                        <th scope="col" class="text-nowrap pe-3">City</th>
                                        <th scope="col" class="text-nowrap pe-3">Postal Code</th>
                                        <th scope="col" class="text-nowrap pe-3">Detail</th>
                                        <th scope="col" class="text-nowrap pe-3">Image</th>
                                    </tr>
                                </thead>
                                <tbody id="bodyTb">
                                    @forelse ($user as $key => $u)
                                        <tr>
                                            <th scope="row">{{ 1 + $key }}</th>
                                            <td class="text-start text-nowrap pe-3">{{ $u->name }}</td>
                                            <td class="text-start text-nowrap pe-3">{{ $u->nik }}</td>
                                            <td class="text-start text-nowrap pe-3">{{ $u->phone }}</td>
                                            <td class="text-start text-nowrap pe-3">{{ $u->email }}</td>
                                            <td class="text-start text-nowrap pe-3">{{ $u->created_at }}</td>
                                            <td class="text-start text-nowrap pe-3">{{ $u->updated_at }}</td>
                                            <td class="text-start text-nowrap pe-3">{{ $u->address->country }}</td>
                                            <td class="text-start text-nowrap pe-3">{{ $u->address->state }}</td>
                                            <td class="text-start text-nowrap pe-3">{{ $u->address->city }}</td>
                                            <td class="text-start text-nowrap pe-3">{{ $u->address->postcode }}</td>
                                            <td class="text-start text-nowrap pe-3">{{ $u->address->detail }}</td>
                                            <td class="text-start text-nowrap pe-3">{{ $u->image->filename }}</td>
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
        <x-modals.plain-modal id="modalGenerateUser">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Generate Random User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form name="formGenerateUser" id="formGenerateUser" method="post"
                        action="{{ route('userApi.dummy') }}" autocomplete="off">
                        @csrf
                            <select class="form-select mb-3" name="sel_qty" id="selSearchBy">
                                <option selected value="">-- Select Qty --</option>
                                    <option value="1">1</option>
                                    <option value="3">3</option>
                                    <option value="5">5</option>
                            </select>
                            <x-button type="submit" class="btn-outline-primary btn-sm w-100">
                                Generate
                            </x-button>
                    </form>
                </div>
            </div>
        </x-modals.basic-modal>
    </div>
    @push('script')
        <script type="text/javascript">
        document.getElementById('modalGenerateUser').addEventListener('hide.bs.modal', function() {
            document.getElementById('formGenerateUser').reset();
        });
        </script>
    @endpush
</x-layout.main-sidebar>
