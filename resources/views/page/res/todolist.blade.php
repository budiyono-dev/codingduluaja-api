<x-layout.main-sidebar title="Resource | Todolist">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="pt-4 pb-4 text-center">
                    <h4>Resource Todolist</h4>
                </div>
                <div class="row justify-content-evenly">
                    <div class="col-7">
                        <div class="table-responsive">
                            <table class="table table-sm  table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($todolist as $key => $t)
                                    <tr onclick="show({{ $t }})">
                                        <th scope="row">{{ ($todolist->currentPage() -1) * $todolist->perPage() + 1 + $key }}</th>
                                        <td class="text-start">{{ $t->get('name') }}</td>
                                        <td class="text-start text-truncate" style="width:10px;">{{ $t->get('description') }}</td>
                                        <td class="text-start">{{ $t->get('date') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">No Data....</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                                {{ $todolist->links('vendor.pagination.bootstrap-5') }}
                        </div>
                    </div>
                    <div class="col-5">
                        <form name="genTodolist" id="genTodolist" action="{{ route('do.todolist.dummy') }}" method="post" autocomplete="off">
                            <div class="card p-3">
                                <div class="text-center p-1">
                                    <h5>Generate Data Todolist</h5>
                                </div>
                                @csrf
                                <select class="form-select mb-3" name="sel_qty" id="selQty">
                                    <option selected value="">-- Select Qty --</option>
                                    <option value="1">1</option>
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                </select>
                                <x-button type="submit" class="btn-sm btn-outline-primary px-3">
                                    Add
                                </x-button>
                            </div>
                        </form>
                        <div class="card p-3 mt-2">
                                <div class="text-center p-1">
                                    <h5>Details</h5>
                                </div>
                                <p ><b id="todoName"></b></p>
                                <p id="todoDesc" ></p>
                                <p id="todoDate" class="blockquote-footer"></p>
                                <p id="todoCreate" class="blockquote-footer"></p>
                                
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('script')
        <script type="text/javascript">
            // console.log('reset', document.getElementById('selQty').value = '');
            const show = (d) => {
                console.log(d, document.getElementById('todoName'));
                document.getElementById('todoName').innerText = d.name;
                document.getElementById('todoDesc').innerText = d.description;
                document.getElementById('todoDate').innerText = d.date_fmt;
                document.getElementById('todoCreate').innerText = d.created_at;
            } 
        </script>
    @endpush
</x-layout.main-sidebar>
