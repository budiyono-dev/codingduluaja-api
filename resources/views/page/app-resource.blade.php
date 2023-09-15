<x-layout.main-sidebar title="App Resource">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="pt-4 pb-4">
                <h4>Your Resources Application</h4>
            </div>
            <div class="text-end mb-2">
                <x-button type="button" class="btn-sm btn-primary px-3" data-bs-toggle="modal"
                    data-bs-target="#modalsAddReouce">
                    Add New Resource
                </x-button>
            </div>
            <div class="row  justify-content-center">
                <div class="col-4">
                    <table class="table table-sm table-bordered " id="connectedAppTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Connected Client</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>

                <div class="col-8">
                    <div class="table-responsive">
                        <table class="table table-sm  table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Resource Name</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($listResource as $key => $resource)
                                    <tr onclick="showConnectedApp(this)"
                                        data-connected-app="{{ $resource->connectedApp }}" class="cursor-pointer"
                                        @if ($key == 0) id="firstResource" @endif>
                                        <td scope="row">{{ $key + 1 }}</th>
                                        <td class="text-start">{{ $resource->name }}</td>
                                        <td class="text-start">
                                            {{ $resource->created_at }}
                                        </td>
                                        <td class="text-center d-flex justify-content-evenly align-items-center">
                                            <form method="post"
                                                action="{{ route('do.deleteAppClient', ['id' => $resource->id]) }}">
                                                @csrf
                                                <x-button-icon type="button" class="btn-danger"
                                                    onclick="deleteAppClient(this)" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" data-bs-title="Delete Resource">
                                                    <x-icon.bi-trash></x-icon.bi-trash>
                                                </x-button-icon>
                                            </form>
                                            <form method="post"
                                                action="{{ route('do.deleteAppClient', ['id' => $resource->id]) }}">
                                                @csrf
                                                <x-button-icon type="button" class="btn-primary"
                                                    onclick="deleteAppClient(this)" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" data-bs-title="Connect App to Resource">
                                                    <x-icon.bi-link></x-icon.bi-link>
                                                </x-button-icon>
                                            </form>
                                            <form method="post"
                                                action="{{ route('do.deleteAppClient', ['id' => $resource->id]) }}">
                                                @csrf
                                                <x-button-icon type="button" class="btn-secondary"
                                                    onclick="deleteAppClient(this)" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" data-bs-title="Disconnect App from Resouce">
                                                    <x-icon.bi-link></x-icon.bi-link>
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
                    </div>
                </div>
            </div>


        </div>
    </div>
    {{-- <!-- Modal --> --}}
    <x-modals.form-modal titleModal="Add Resource" id="modalsAddReouce" idModalBtnSubmit="btnSubmitResource">
        <form name="addResource" id="addResource" action="{{ route('do.addResource') }}" method="post">
            @csrf
            <select class="form-select" name="sel-master-resource" id="selResource">
                @forelse ($masterResource as $key => $mRes)
                    @if ($key == 0)
                        <option selected value="">-- Select Resource --</option>
                    @endif
                    <option value="{{ $mRes->id }}">{{ $mRes->name }}</option>
                @empty
                    <option selected value="">-- No Resource Found --</option>
                @endforelse
            </select>
        </form>
    </x-modals.form-modal>

    @push('script')
        <script type="text/javascript">
            const resetModalAddResource = () => {
                document.getElementById('addResource').reset();
            }
            const sumbitAddResource = () => {
                document.addResource.submit();
            }
            const deleteResource = (e) => {
                deleteConfirmation(() => e.parentElement.submit());
            }
            const showConnectedApp = (e) => {
                const appList = JSON.parse(e.dataset.connectedApp);
                let tableBody = document.getElementById('connectedAppTable').getElementsByTagName('tbody')[0];
                let i = 1;
                tableBody.innerHTML = '';
                for (const app of appList) {
                    // console.log(app);
                    let row = tableBody.insertRow(-1);

                    // Create table cells
                    let c1 = row.insertCell(0);
                    let c2 = row.insertCell(1);

                    // Add data to c1 and c2
                    c1.innerText = i;
                    c1.setAttribute('scope', 'row');

                    c2.innerText = app.name;
                    c2.classList.add('text-start');

                    i++;
                }

            }

            document.getElementById('btnSubmitResource').disabled = true;

            const enableSubmit = (e) => {
                const btnSubmitResource = document.getElementById('btnSubmitResource');
                if (e.target.value) {
                    btnSubmitResource.disabled = false;
                } else {
                    btnSubmitResource.disabled = true;
                }
            }

            const firstResource = document.getElementById('firstResource');
            if (firstResource) {
                firstResource.click();
            }
        </script>
    @endpush
    @push('addEventListener')
        <script type="text/javascript">
            document.getElementById('modalsAddReouce').addEventListener('show.bs.modal', resetModalAddResource);
            document.getElementById('btnSubmitResource').addEventListener('click', sumbitAddResource);
            document.getElementById('selResource').addEventListener('change', enableSubmit);
        </script>
    @endpush
</x-layout.main-sidebar>
