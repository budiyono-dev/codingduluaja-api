<x-layout.main-sidebar title="App Manager">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="pt-4 pb-4">
                <h4>App Manager</h4>
            </div>
            {{-- <div class="text-end mb-2">
                <x-button type="button" class="btn-sm btn-outline-primary px-3" data-bs-toggle="modal"
                    data-bs-target="#modalCreateNewApp">
                    Create New App
                </x-button>
            </div> --}}
            <div class="table-responsive">
                <table class="table table-sm  table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Resource</th>
                            <th scope="col">Connected App</th>
                            <th scope="col">Token</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @forelse ($listApp as $key => $app)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td class="text-start">{{ $app->resource_name }}</td>
                                <td class="text-start">{{ $app->app_name }}</td>
                                <td class="text-start">
                                    <x-button type="button" class="btn-outline-primary btn-sm"
                                        onclick="deleteAppClient(this)">
                                        Show Token
                                    </x-button>
                                </td>
                                <td class="text-center d-flex justify-content-evenly align-items-center">
                                    <x-button type="button" class="btn-outline-primary btn-sm" id="btnGenerateToken"
                                        onclick="deleteAppClient(this)">
                                        Generate Token
                                    </x-button>
                                    <x-button type="button" class="btn-outline-danger btn-sm" id="btnRevokeToken"
                                        onclick="deleteAppClient(this)">
                                        Revoke Token
                                    </x-button>
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
    {{-- <!-- Modal --> --}}
    <x-modals.form-modal titleModal="Generate Token" id="modalGenerateToken" idModalBtnSubmit="btnSbGenToken">
        <form name="createApp" id="createApp" action="" method="post" autocomplete="off">
            @csrf
            <div class="form-floating">
                <input type="text" class="form-control" id="txtName" name="name" placeholder="my-app">
                <label for="txtName">Name</label>
            </div>
        </form>
    </x-modals.form-modal>

    <x-modals.form-modal titleModal="Token" id="" idModalBtnSubmit="btnSbGenToken">
        <form name="createApp" id="createApp" action="" method="post" autocomplete="off">
            @csrf
            <div class="form-floating">
                <input type="text" class="form-control" id="txtName" name="name" placeholder="my-app">
                <label for="txtName">Name</label>
            </div>
        </form>
    </x-modals.form-modal>

    <x-modals.basic-modal id="">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Token</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <input class="form-control" type="text" value="Disabled readonly input" aria-label="Disabled input example" disabled readonly>
        </div>
    </x-modals.basic-modal>

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
    @push('addEventListener')
        <script type="text/javascript">
            document.getElementById('modalCreateNewApp').addEventListener('hide.bs.modal', resetModalCreateNewApp);
            document.getElementById('btnSubmitCreateApp').addEventListener('click', submitCreateAppForm);
            document.getElementById('btnGenerateToken').addEventListener('click', submitCreateAppForm);
        </script>
    @endpush
</x-layout.main-sidebar>
