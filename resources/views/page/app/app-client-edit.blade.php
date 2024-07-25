<x-layout.main-sidebar title="Application | Client">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="card mt-3">
                    <h2 class="fs-5 card-header">
                        Edit client
                    </h2>
                    <div class="card-body">
                        <form action="{{ route('do.app.client.edit') }}" method="POST">
                            @csrf
                            <input type="hidden" name="txtId" value="{{$appClient->id}}">
                            <div class="mb-3">
                                <label for="txtName" class="form-label">Application Name</label>
                                <input type="text" class="form-control" id="txtName" name="txtName" value="{{$appClient->name}}">
                            </div>
                            <div class="mb-3">
                                <label for="txtDescription" class="form-label">Description</label>
                                <input type="text" class="form-control" id="txtDescription" name="txtDescription" value="{{$appClient->description}}">
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('script')
    <script type="text/javascript"></script>
    @endpush
</x-layout.main-sidebar>
