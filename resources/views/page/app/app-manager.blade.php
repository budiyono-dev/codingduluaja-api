<x-layout.main-sidebar title="Application | Manager">
    <div class="row">
        <div class="col">
            <div class="card mt-3 shadow">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="m-0">Application Manager</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="list-group">
                        @forelse ($listResource as $key => $res)
                        <div class="list-group-item list-group-item-action list-group-item-primary d-flex justify-content-between">
                            <a data-bs-toggle="collapse" href="{{ '#collapse' . $key }}">
                                {{ $res->masterResource->name }}
                            </a>
                            <a type="button" class="btn btn-success btn-sm"
                                href="{{route('app.manager.connect', ['resourceId'=>$res->id])}}">Connect the Client</a>
                        </div>

                        <ul class="list-group collapse" id="{{ 'collapse' . $key }}">
                            @forelse ($res->connectedApp as $ca)
                            <li class="list-group-item list-group-item-warning">
                                <a class="list-group-item list-group-item-action list-group-item-warning"
                                    data-bs-toggle="collapse" href="{{ '#ca' . $ca->id.'ca'.$key }}">
                                    {{ $ca->name }}
                                </a>
                                <ul class="list-group collapse" id="{{ 'ca' . $ca->id.'ca'.$key }}">
                                    <li class="list-group-item list-group-item-primary">
                                        <div class="row">
                                            <div class="col-auto">
                                                <form action="{{route('app.manager.createToken')}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" value="{{$res->id}}" name="txtResId">
                                                    <input type="hidden" value="{{$ca->id}}" name="txtAppId">
                                                    <div class="row">
                                                        <div class="col-auto">
                                                            <select class="form-select form-select-sm" name="duration" required>
                                                                <option selected value="">Select Token Duration..</option>
                                                                @foreach ($expList as $key => $exp)
                                                                <option value="{{ $exp->id }}">
                                                                    {{ $exp->exp_value . ' ' . Str::ucfirst(strtolower($exp->unit)) }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-auto">
                                                            <button type="submit" class="btn btn-primary btn-sm">Create Token</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-auto">
                                                <form action="{{route('app.manager.showToken')}}" method="GET">

                                                    <input type="hidden" value="{{$res->id}}" name="txtResId">
                                                    <input type="hidden" value="{{$ca->id}}" name="txtAppId">
                                                    <button type="submit" class="btn btn-success btn-sm">Show Token</button>
                                                </form>
                                            </div>
                                            <div class="col-auto">
                                                <form action="{{route('app.manager.revokeToken')}}" method="POST"
                                                        name="formRevokeToken">
                                                    @csrf
                                                    <input type="hidden" value="{{$res->id}}" name="txtResId">
                                                    <input type="hidden" value="{{$ca->id}}" name="txtAppId">
                                                    <button type="submit" class="btn btn-danger btn-sm">Revoke Token</button>
                                                </form>
                                            </div>
                                            <div class="col-auto">
                                                <form action="{{route('app.manager.disconnect')}}" method="POST"
                                                        name="formDisconnect">
                                                    @csrf
                                                    <input type="hidden" value="{{$res->id}}" name="txtResId">
                                                    <input type="hidden" value="{{$ca->id}}" name="txtAppId">
                                                    <button type="submit" class="btn btn-danger btn-sm">Disconnect the Client</button>
                                                </form>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            @empty
                            <li class="list-group-item list-group-item-warning">
                                <span>No Data....</span>
                            </li>
                            @endforelse
                        </ul>
                        @empty
                        <p>No Data....</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('script')
    <script>
        const token = {!! json_encode(session('token')) !!};
        if (token) {
            Swal.fire({
                title: "Your Token",
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
        const formDisconnect = document.querySelectorAll('form[name="formDisconnect"]');
        if (formDisconnect) {
            for (let f of formDisconnect) {
                f.addEventListener('submit', (e) => {
                    e.preventDefault();
                    swal2(() => f.submit(), {text:'Are you sure want to disconnect your app?', confirmButtonText:'Yes'});
                    return false;
                });
            }
        }
        const formRevokeToken = document.querySelectorAll('form[name="formRevokeToken"]');
        if (formRevokeToken) {
            for (let f of formRevokeToken) {
                f.addEventListener('submit', (e) => {
                    e.preventDefault();
                    swal2(() => f.submit());
                    return false;
                });
            }
        }
    </script>
    @endpush
</x-layout.main-sidebar>
