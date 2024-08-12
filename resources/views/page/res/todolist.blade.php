<x-layout.main-sidebar title="Resource | Todolist">
    <div class="row">
        <div class="col">
            <div class="card mt-3 shadow">
                <div class="card-header d-flex">
                    <h4 class="m-0">Todolist</h4>
                    <a class="btn btn-sm btn-primary px-3 mx-3"
                       href="{{ route('res.todolist.pageDummy') }}">Add Dummy
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">description</th>
                                <th scope="col" style="min-width:100px;">Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($todolist as $key => $t)
                                <tr onclick="show({{ $t }})">
                                    <th scope="row">{{ 1 + $key }}</th>
                                    <td class="text-start">{{ $t->name }}</td>
                                    <td class="text-start">{{ $t->description }}</td>
                                    <td class="text-start">{{ $t->date }}</td>
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
            </div>
        </div>
    </div>
</x-layout.main-sidebar>
