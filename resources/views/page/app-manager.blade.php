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
                                    <x-button type="button" class="btn-outline-info btn-sm"
                                        onclick="showToken(this)">
                                        Show Token
                                    </x-button>
                                </td>
                                <td class="text-center d-flex justify-content-evenly align-items-center">
                                    <x-button type="button" class="btn-outline-primary btn-sm" id="btnGenerateToken"
                                        onclick="showGenerateToken(this, {{$app->client_app_id}}, {{$app->client_resource_id}})">
                                        Generate Token
                                    </x-button>
                                    <x-button type="button" class="btn-outline-danger btn-sm" id="btnRevokeToken"
                                        onclick="showRevokeToken(this)">
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

    <x-modals.form-modal titleModal="Token" id="" idModalBtnSubmit="btnSbGenToken">
        <form name="createApp" id="createApp" action="" method="post" autocomplete="off">
            @csrf
            <div class="form-floating">
                <input type="text" class="form-control" id="txtName" name="name" placeholder="my-app">
                <label for="txtName">Name</label>
            </div>
        </form>
    </x-modals.form-modal>

    <x-modals.basic-modal id="modalGenerateToken">
        <form autocomple="off" name="generateToken">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Token</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{--<div class="mb-3">
                    <input class="form-control" type="text" value="Disabled readonly input" aria-label="Disabled input example" disabled readonly>    
                </div>--}}
                <div class="mb-3">
                    <select class="form-select" aria-label="Default select example" name="selExp" id="selExp">
                        @forelse ($expList as $key => $exp)
                            @if ($key == 0) 
                                <option selected value="">Select Token Duration..</option> 
                            @endif
                            <option value="{{ $exp->id }}">{{$exp->exp_value.' '.Str::ucfirst(strtolower($exp->unit))}}</option>
                        @empty
                            <option selected value="">No Data..</option>
                        @endforelse  
                    </select>    
                </div>
            </div>
            <div class="modal-footer">
                <div class="d-flex w-100">
                    <x-button type="submit" class="btn-outline-primary btn-sm w-100" >
                        Generate Token
                    </x-button>
                </div>
            </div>
        <form>
    </x-modals.basic-modal>

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
            let clientAppId;
            let clientResourceId;
            console.log(document.generateToken);
            const modalGenerateToken = new bootstrap.Modal('#modalGenerateToken', { });
            const showGenerateToken = (e, clAppId, clResourceId) => {
                clientAppId = clAppId;
                clientResourceId = clResourceId;
                modalGenerateToken.show();
            }
            const submitGenerateToken = async (e) => {
                e.preventDefault();
                console.log('submit form generate token');
                const res = await fetch("{{ route('do.generateToken') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-Token': csrfToken
                        },
                        body: JSON.stringify(
                            {
                                client_app_id: clientAppId,
                                client_resource_id: clientResourceId,
                                exp: document.generateToken.selExp.value
                            }
                        )

                    });
                    const jsonRes = await res.json();
                    console.log(jsonRes);
                // return false;
            }
        </script>
    @endpush
    @push('addEventListener')
        <script type="text/javascript">
            document.generateToken.addEventListener('submit', submitGenerateToken);
            // document.getElementById('showGenerateToken').addEventListener('show.bs.modal', resetModalCreateNewApp);
            // document.getElementById('btnSubmitCreateApp').addEventListener('click', submitCreateAppForm);
            // document.getElementById('btnGenerateToken').addEventListener('click', submitCreateAppForm);
        </script>
    @endpush
</x-layout.main-sidebar>
