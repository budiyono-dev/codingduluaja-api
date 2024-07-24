<x-layout.main-sidebar title="Application | Manager">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="d-flex align-items-center my-3 ">
                    <h4 class="m-0">Application Manager</h4>
                </div>
                <div class="list-group">
                    @forelse ($listResource as $key => $res)
                    <a class="list-group-item list-group-item-action list-group-item-primary"
                       data-bs-toggle="collapse" href="{{ '#collapse' . $key }}">
                        {{ $res->masterResource->name }}
                    </a>
                    <ul class="list-group collapse" id="{{ 'collapse' . $key }}">
                        <li class="list-group-item list-group-item-warning">
                            <a type="button" class="btn btn-success btn-sm"
                               href="{{route('page.app.manager.connect', ['resourceId'=>$res->id])}}">Connect the Client</a>
                        </li>
                        @forelse ($res->connectedApp as $ca)
                        <li class="list-group-item list-group-item-warning">
                            <a class="list-group-item list-group-item-action list-group-item-warning" data-bs-toggle="collapse" href="{{ '#collapseca' . $ca->id }}">
                                {{ $ca->name }}
                            </a>
                            <ul class="list-group collapse" id="{{ 'collapseca' . $ca->id }}">
                                <li class="list-group-item list-group-item-primary">
                                    <div class="row">
                                        <div class="col-auto">
                                            <form action="{{route('do.app.manager.create')}}" method="POST">
                                                @csrf
                                                <input type="hidden" value="{{$ca->id}}" name="txtResId">
                                                <input type="hidden" value="{{$ca->id}}" name="txtAppId">
                                                <div class="row">
                                                    <div class="col-auto">
                                                        <select class="form-select form-select-sm" name="selExp">
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
                                            <form action="{{route('do.app.manager.token')}}" method="GET">

                                                <input type="hidden" value="{{$ca->id}}" name="txtResId">
                                                <input type="hidden" value="{{$ca->id}}" name="txtAppId">
                                                <button type="submit" class="btn btn-success btn-sm">Show Token</button>
                                            </form>
                                        </div>
                                        <div class="col-auto">
                                            <form action="{{route('do.app.manager.revoke')}}" method="POST">
                                                @csrf
                                                <input type="hidden" value="{{$ca->id}}" name="txtResId">
                                                <input type="hidden" value="{{$ca->id}}" name="txtAppId">
                                                <button type="button" class="btn btn-danger btn-sm">Revoke Token</button>
                                            </form>
                                        </div>
                                        <div class="col-auto">
                                            <form action="{{route('do.app.manager.revoke')}}" method="POST">
                                                @csrf
                                                <input type="hidden" value="{{$ca->id}}" name="txtResId">
                                                <input type="hidden" value="{{$ca->id}}" name="txtAppId">
                                                <button type="button" class="btn btn-danger btn-sm">Disconnect the Client</button>
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
    @push('script')
    <script>
        const token = {!! json_encode(session('token')) !!};
        if (token) {
            Swal.fire({
                title: "Your Token",
                text: token,
                icon: "info",
                confirmButtonText: "Copy"
            }).then((result) => {
                if (result.isConfirmed) {
                    navigator.clipboard.writeText(token);
                    showSimpleToast('Copied to clipboard', 'success');
                }
            });
        }
        const formDelete = document.querySelectorAll('form[name="formDeleteAppClient"]');
        if (formDelete) {
            for (let f of formDelete) {
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
