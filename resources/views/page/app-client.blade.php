<x-layout.main-sidebar title="App Clients">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="d-flex align-items-center justify-content-between p-3 my-3 ">
                <h4 class="m-0">Your Client Application</h4>
                <x-button type="button" class="btn-sm btn-outline-primary px-3" data-bs-toggle="modal"
                    data-bs-target="#modalCreateNewApp">
                    Create New App
                </x-button>
            </div>
            <div class="table-responsive">
                <table class="table table-sm table-hover" id="tbAppClient">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($listClientApp as $key => $appClient)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td class="text-start">{{ $appClient->name }}</td>
                                <td class="text-start">{{ $appClient->created_at }}</td>
                                <td>
                                    <form method="post" autocomplete="off"
                                        action="{{ route('do.deleteClientApp', ['id' => $appClient->id]) }}">
                                        @csrf
                                        <x-button-icon type="button" class="btn-outline-danger"
                                            onclick="deleteAppClient(this)">
                                            <x-icon.bi-trash></x-icon.bi-trash>
                                        </x-button-icon>
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
                {{-- $listClientApp->links('vendor.pagination.bootstrap-5') --}}
            </div>
        </div>
    </div>
    {{-- <!-- Modal --> --}}
    <x-modals.form-modal titleModal="Add New App" id="modalCreateNewApp" idModalBtnSubmit="btnSubmitCreateApp">
        <form name="createApp" id="createApp" action="{{ route('do.createApp') }}" method="post" autocomplete="off">
            @csrf
            <div class="form-floating">
                <input type="text" class="form-control" id="txtName" name="name" placeholder="my-app">
                <label for="txtName">Name</label>
            </div>
        </form>
    </x-modals.form-modal>
    @push('script')
        <script type="text/javascript">
            const resetModalCreateNewApp = () => {
                document.createApp.reset();
            }
            const submitCreateAppForm = () => {
                document.createApp.submit();
            }
            const deleteAppClient = (e) => {
                deleteConfirmation(() => e.parentElement.submit());
            }
        </script>
    @endpush
    @push('script')
        <script>
            document.getElementById('modalCreateNewApp').addEventListener('hide.bs.modal', resetModalCreateNewApp);
            document.getElementById('btnSubmitCreateApp').addEventListener('click', submitCreateAppForm);
        </script>
    @endpush
</x-layout.main-sidebar>
