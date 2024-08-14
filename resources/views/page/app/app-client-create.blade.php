<x-layout.main-sidebar title="Application | Client">
    <div class="row">
        <div class="col-lg-6">
            <div class="card mt-3 shadow">
                <h2 class="fs-5 card-header">
                    Create new client
                </h2>
                <div class="card-body">
                    <form action="{{ route('app.client.doCreate', absolute:false) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="txtName" class="form-label">Application Name</label>
                            <input type="text" class="form-control" id="txtName" name="application_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="txtDescription" class="form-label">Description</label>
                            <input type="text" class="form-control" id="txtDescription" name="description" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout.main-sidebar>
