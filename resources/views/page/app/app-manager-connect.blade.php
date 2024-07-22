<x-layout.main-sidebar title="Application | Manager">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="fs-5 my-3">Add New Resource</h2>
                <form action="{{ route('do.app.connectManager') }}" method="POST">
                    @csrf
                    <input type="hidden" value="{{$resourceId}}">
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
</x-layout.main-sidebar>
