<x-layout.main-sidebar title="App Clients">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="pt-4 pb-4">
                <h4>Your Resources Application</h4>
            </div>
            <div class="text-end mb-2">
                <button type="button" class="btn btn-sm btn-primary px-3"
                 data-bs-toggle="modal" data-bs-target="#modalCreateNewApp">
                    Add New Resource
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
                        <select class="form-select" aria-label="Default select example">
                          <option selected value="">Open this select menu</option>
                          @foreach ($masterResource as $mRes)
                              <option value="{{  $mRes->id  }}">{{  $mRes->name  }}</option>
                          @endforeach
                        </select>
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

    @push('script')
    <script type="text/javascript">
       
    </script>
    @endpush
    @push('addEventListener')
        <script type="text/javascript">
        </script>
    @endpush
</x-layout.main-sidebar>
