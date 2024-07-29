<x-layout.main-sidebar title="Application | Resource">
    <div class="row">
        <div class="col-lg-6">
            <div class="card mt-3">
                <div class="card-header">
                    <h2 class="fs-5">Add New Resource</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('app.resource.doCreate') }}" method="POST">
                        @csrf
                        <select class="form-select mb-3" name="selResource">
                            <option selected value="">-- Select Resource --</option>
                            @foreach ($masterResource as $mRes)
                            <option value="{{ $mRes->id }}">{{ $mRes->name }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout.main-sidebar>
