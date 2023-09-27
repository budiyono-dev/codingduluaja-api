<x-layout.main-sidebar title="App Resource">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="pt-4 pb-4 text-center">
                    <h4>Your Resources Application</h4>
                </div>
                <div class="row justify-content-evenly">
                    <div class="col-5">
                        <table class="table table-sm table-bordered" id="connectedAppTable">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Connected Client</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody  class="table-group-divider">
                            </tbody>
                        </table>
                        <x-button type="submit" class="btn-outline-primary w-100 btn-sm" id="btnAddClient">
                            Add Client
                        </x-button>
                    </div>

                    <div class="col-5">
                        <div class="table-responsive">
                            <table class="table table-sm  table-hover table-bordered">
                                <thead class="table-dark text-center">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Resource Name</th>
                                        {{-- <th scope="col">Created At</th> --}}
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($listResource as $key => $resource)
                                        <tr onclick="showConnectedApp(this)"
                                            data-connected-app="{{ $resource->connectedApp }}" class="cursor-pointer"
                                            data-id-resource="{{ $resource->id }}"
                                            @if ($key == 0) id="firstResource" @endif>
                                            <td class="text-center">{{ $key + 1 }}</th>
                                            <td class="text-start">{{ $resource->name }}</td>
                                            {{-- <td class="text-start"> {{ $resource->created_at }} </td> --}}
                                            <td class="text-center d-flex justify-content-evenly align-items-center">
                                                <form method="post"
                                                    action="{{ route('do.deleteAppClient', ['id' => $resource->id]) }}">
                                                    @csrf
                                                    <x-button-icon type="button" class="btn-outline-danger"
                                                        onclick="deleteAppClient(this)" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" data-bs-title="Delete Resource">
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
                            <x-button type="button" class="btn-sm btn-outline-primary w-100 btn-sm" data-bs-toggle="modal"
                                data-bs-target="#modalsAddReouce">
                                Add New Resource
                            </x-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    {{-- <!-- Modal --> --}}
    <x-modals.form-modal titleModal="Add Resource" id="modalsAddReouce" idModalBtnSubmit="btnSubmitResource">
        <form name="addResource" id="addResource" action="{{ route('do.addResource') }}" method="post">
            @csrf
            <select class="form-select" name="sel_m_resource" id="selResource">
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

    {{-- <!-- Modal --> --}}
    <x-modals.form-modal titleModal="Connect Client Resource" id="modalConnectClient" idModalBtnSubmit="btnSbConnectClient">
        <form name="connectClient" id="connectClient" method="post">
            @csrf
            <select class="form-select" id="selClientNotConnected" name="sel_client">
            </select>
        </form>
    </x-modals.form-modal>

    @push('script')
        <script type="text/javascript">
            const modalConnectClient = new bootstrap.Modal('#modalConnectClient', { });
            const listAppClient = {!! json_encode($listAppClient) !!}
            let idResource;
            console.log(listAppClient);
            
            const resetModalAddResource = () => {
                document.addResource.reset();
            }
            const resetModalConnectClient = () => {
                document.connectClient.reset();
            }
            const sumbitAddResource = () => {
                document.addResource.submit();
            }
            const submitConnectClient = () => {
                document.connectClient.submit();
            }
            const deleteResource = (e) => {
                deleteConfirmation(() => e.parentElement.submit());
            }
            const createSellAppClient = (appList) => {
                const selClientNotConnected = document.getElementById('selClientNotConnected');
                const mapAppList = new Map(appList.map(el => [el.id, el]));
                let selAppClient = listAppClient.filter(app => mapAppList.get(app.id) ? false : true);
                selClientNotConnected.innerHTML = '';

                if (selAppClient.length > 0) {
                    console.log(selAppClient);
                    selClientNotConnected.add(new Option('-- Select Client --', '-'));
                    for (const el of selAppClient) {
                        selClientNotConnected.add(new Option(el.name, el.id));
                    }
                } else {
                    selClientNotConnected.add(new Option('Not Found', '-'));
                }
            }
            const showConnectedApp = (e) => {
                const appList = JSON.parse(e.dataset.connectedApp);
                idResource = e.dataset.idResource;
                let tableBody = document.getElementById('connectedAppTable').getElementsByTagName('tbody')[0];
                let i = 1;
                tableBody.innerHTML = '';
                if (appList.length > 0) {
                    for (const app of appList) {
                        // console.log(app);
                        let row = tableBody.insertRow(-1);

                        // Create table cells
                        let c1 = row.insertCell(0);
                        let c2 = row.insertCell(1);
                        let c3 = row.insertCell(2);

                        // Add data to c1 and c2
                        c1.innerText = i;
                        c1.setAttribute('scope', 'row');
                        c1.classList.add('text-center');

                        c2.innerText = app.name;
                        c2.classList.add('text-start');

                        c3.innerHTML = generateDeleteApp(idResource, app.id);
                        c3.classList.add('text-center', 'd-flex', 'justify-content-evenly', 'align-items-center');
                        i++;
                    }
                } else {
                    let row = tableBody.insertRow(-1);

                    // Create table cells
                    let c1 = row.insertCell(0);
                    c1.style.height = '38px';
                    c1.colSpan = 3;
                    c1.innerText = 'No App Connected';
                    c1.classList.add('text-center');
                }
                createSellAppClient(appList);
            }

            const generateDeleteApp = (idResource, idApp) => {
                let url = {!! json_encode(route('do.disconnectClient', ['id' => ':id'])) !!};
                url = url.replace(':id', idResource);
                return `
                <form method="post" action="${url}">
                    @csrf
                    <input type="hidden" name="client_id" value="${idApp}">
                    <x-button-icon type="button" class="btn-outline-danger"
                        onclick="deleteApp(this)" data-bs-toggle="tooltip"
                        data-bs-placement="top" data-bs-title="Connect App to Resource">
                        <x-icon.bi-trash></x-icon.bi-trash>
                    </x-button-icon>
                </form>
                `;
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

            const deleteApp = (e) => {
                deleteConfirmation(() => e.parentElement.submit());
            }

            const addApp = (e) => {
                let f = document.getElementById("connectClient");
                console.log(f.action);
                
                let url = {!! json_encode(route('do.connectClient', ['id' => ':id'])) !!};
                url = url.replace(':id', idResource);
                f.action = url;
                
                modalConnectClient.show();
            }

            // ================ onload =============
            const firstResource = document.getElementById('firstResource');
            if (firstResource) {
                firstResource.click();
            }
        </script>
    @endpush
    @push('addEventListener')
        <script type="text/javascript">
            document.getElementById('modalsAddReouce').addEventListener('show.bs.modal', resetModalAddResource);
            document.getElementById('modalConnectClient').addEventListener('show.bs.modal', resetModalConnectClient);
            document.getElementById('btnSubmitResource').addEventListener('click', sumbitAddResource);
            document.getElementById('btnSbConnectClient').addEventListener('click', submitConnectClient);
            document.getElementById('selResource').addEventListener('change', enableSubmit);
            document.getElementById('btnAddClient').addEventListener('click', addApp);
        </script>
    @endpush
</x-layout.main-sidebar>
