<x-layout.main-sidebar title="App Clients">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="pt-4 pb-4">
                <h4>Your Client Application</h4>
            </div>
            <div class="text-end mb-2">
                <button type="button" class="btn btn-sm btn-primary px-3"
                 data-bs-toggle="modal" data-bs-target="#modalCreateNewApp">
                 Create New App
                </button>
                <button type="button" class="btn btn-sm btn-primary px-3" onclick="shomodals()">
                 xxxxxx
                </button>
            </div>
            <div class="table-responsive">
                <table class="table table-sm  table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($listAppClient as $key => $appClient)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td class="text-start">{{ $appClient->name }}</td>
                                <td class="text-start">{{ $appClient->created_at }}</td>
                                <td>
                                    <form method="post" action="{{ route('do.deleteAppClient', ['id' => $appClient->id]))  }}"> 
                                        <button type="button" class="btn btn-danger" onclick="deleteAppClient()">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="16"
                                                height="16"
                                                fill="currentColor"
                                                class="bi bi-trash"
                                                viewBox="0 0 16 16">
                                            <path
                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                          </svg>
                                        </button>
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
            </div>
        </div>
    </div>
    {{-- <!-- Modal --> --}}
    <div
        class="modal fade"
        id="modalCreateNewApp"
        data-bs-backdrop="static"
        data-bs-keyboard="false"
        tabindex="-1"
        aria-labelledby="staticBackdropLabel"
        aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Create New App</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form name="createApp" id="createApp" action="{{ route('do.createApp') }}" method="post">
                    @csrf
                    <div class="form-floating">
                        <input type="text" class="form-control" id="txtName" name="name" placeholder="my-app">
                        <label for="txtName">Name</label>
                      </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="d-flex w-100">
                    <button type="submit" id="btnSubmitCreateApp" class="btn btn-primary btn-sm w-100">Save</button>
                </div>
            </div>
        </div>
        </div>
    </div>
    {{-- <!-- Modal --> --}}
    <div
        class="modal fade"
        id="modals"
        {{-- data-bs-backdrop="static" --}}
        data-bs-keyboard="false"
        tabindex="-1"
        {{-- aria-labelledby="staticBackdropLabel" --}}
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content d-flex justify-content-center align-items-center">
                <div class="modal-header w-100">
                    <h1 class="modal-title fs-5 m-auto" id="staticBackdropLabel">Confirmation</h1>
                </div>
                <div class="modal-body d-flex align-items-center">
                    <p class="mb-0" id="confirmationMsg">????</p>
                </div>
                <div class="modal-footer w-100">
                    <button type="submit" id="btnConfirmYes" class="btn btn-danger w-100">OK!</button>
                </div>
            </>
        </div>
    </div>
    @push('script')
    <script type="text/javascript">
        var resolveGlobal;
        const myModalAlternative = new bootstrap.Modal('#modals', {
            keyboard: false
        });
        const resetModalCreateNewApp = () => {
            document.getElementById('createApp').reset();
        }
        const submitCreateAppForm = () => {
            document.createApp.submit();
        }
        const deleteAppClient = (e) => {
            e.preventDefault();
            console.log('delete app client', e.target.value);
            deleteConfirmation(
                    async () => {
                        try {
                            let url = {!! json_encode(route('do.deleteAppClient', ['id' => ':id'])) !!};
                            url = url.replace(':id', id);
                            const res = await fetch(url, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-Token': csrfToken
                                },
                            });
                            if (res.ok) {
                                const data = await res.json();
                                console.log(data);
                            }
                        } catch (err) {
                            console.error(err);
                        } finally {
                        }
                    }
            );
        }
        const shomodals = () => {
            console.log('show modals');
            myModalAlternative.show();
        }
        const deleteConfirmation = (callback, msg = 'Are you sure?', buttonType) => {
            let promise = new Promise(function(resolve, reject) {
                        let confirmValue = true;
                        resolveGlobal = resolve;
                        document.getElementById('confirmationMsg').innerHTML = msg;
                        document.getElementById('btnConfirmYes').innerHTML = msg;
                        myModalAlternative.show();
                    });
            promise.then(data => {
                if (data) {
                    callback();
                }
            });
        }
        const modalsFunc = () => {
            console.log('modals ditutup');
            resolveGlobal(false);
        }
        const confirmationYes = () => {
            resolveGlobal(true);
        }
    </script>
    @endpush
    @push('addEventListener')
        <script type="text/javascript">
            document.getElementById('modalCreateNewApp').addEventListener('hide.bs.modal', resetModalCreateNewApp);
            document.getElementById('btnSubmitCreateApp').addEventListener('click', submitCreateAppForm);
            document.getElementById('btnConfirmYes').addEventListener('click', confirmationYes);
            document.getElementById('modals').addEventListener('hide.bs.modal', modalsFunc);
        </script>
    @endpush
</x-layout.main-sidebar>
