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
                                   href="{{route('page.app.connectManager', ['resourceId'=>$res->id])}}">Connect the Client</a>
                            </li>
                            @forelse ($res->connectedApp as $ca)
                                <li class="list-group-item list-group-item-warning">
                                    <p>{{ $ca->name }}</p>
                                    <div class="d-flex gap-3 my-2">
                                    <button type="button" class="btn btn-primary btn-sm">Create Token</button>
                                    <button type="button" class="btn btn-danger btn-sm">Revoke Token</button>
                                    </div>
                                </li>
                            @empty
                            <li class="list-group-item list-group-item-warning">
                                <span>No Data....</span>
                            </li>
                            @endforelse
                            {{-- <a type="button" class="btn btn-success btn-sm" 
                               href="{{route('page.app.connectManager', ['resourceId'=>$res->id])}}">Connect the Client</a> --}}
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
