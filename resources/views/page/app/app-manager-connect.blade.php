<x-layout.main-sidebar title="Application | Manager">
    <div class="row">
        <div class="col-lg-6">
            <div class="card mt-3">
                <div class="card-header">
                    <h2 class="fs-5">Add New Resource</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('app.manager.doConnect') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{$resourceId}}" name="txtResourceId">
                        <select class="form-select mb-3" name="selApp">
                            <option selected value="">-- Select Resource --</option>
                            @foreach ($listClient as $c)
                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout.main-sidebar>
