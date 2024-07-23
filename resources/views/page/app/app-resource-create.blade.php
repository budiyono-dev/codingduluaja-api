<x-layout.main-sidebar title="Application | Resource">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="fs-5 my-3">Add New Resource</h2>
                <form action="{{ route('do.app.resource.create') }}" method="POST">
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
</x-layout.main-sidebar>
