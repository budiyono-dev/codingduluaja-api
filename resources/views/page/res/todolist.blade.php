<x-layout.main-sidebar title="Resource | Todolist">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="pt-4 pb-4 text-center">
                    <h4>Resource Todolist</h4>
                </div>
                <div class="row justify-content-evenly">
                    <div class="col-8">
                        <div class="table-responsive">
                            <table class="table table-sm  table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Created At</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($todolist as $key => $t)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td class="text-start">{{ $t->name }}</td>
                                        <td class="text-start">{{ $t->description }}</td>
                                        <td class="text-start">{{ $t->date }}</td>
                                        <td class="text-start">{{ $t->created_at }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">No Data....</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-4">
                        <form name="addResource" id="addResource" action="{{ route('do.addResource') }}" method="post" autocomplete="off">
                            <div class="card p-3">
                                <div class="text-center p-1">
                                    <h5>Generate Data Todolist</h5>
                                </div>
                                @csrf
                                <select class="form-select mb-3" name="sel_qty" id="selQty">
                                    <option selected value="">-- Select Qty --</option>
                                    <option selected value="1">1</option>
                                    <option selected value="5">5</option>
                                    <option selected value="10">10</option>
                                    <option selected value="20">20</option>
                                </select>
                                <x-button type="button" class="btn-sm btn-outline-primary px-3">
                                    Add
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout.main-sidebar>
