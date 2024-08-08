<x-layout.main-sidebar title="Resource | Todolist">
    <div class="row">
        <div class="col-lg-6">
            <div class="card mt-3 shadow">
                <div class="card-header d-flex">
                    <h4 class="m-0">Create Dummy Todolist</h4>
                </div>
                <div class="card-body">
                    <form name="genTodolist" id="genTodolist" action="{{ route('res.todolist.dummy') }}" method="POST" autocomplete="off">
                            @csrf
                            <select class="form-select mb-3" name="sel_qty" id="selQty" required>
                                <option selected value="">-- Select Qty --</option>
                                <option value="1">1</option>
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                            </select>
                            <button type="submit" class="btn btn-sm btn-primary px-3 w-100">
                                Generate
                            </button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout.main-sidebar>
