<x-layout.main-sidebar title="Admin | Feedback">
    <div class="row">
        <div class="col-lg-8">
            <div class="card mt-3">
                <div class="card-header">
                    <h4>Feedback</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm  table-hover table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">User ID</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse ($report as $r)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td class="text-start">{{ $r->user->name }}</td>
                                    <td class="text-start">{{ $r->title }}</td>
                                    <td class="text-start">{{ $r->category }}</td>
                                    <td class="text-center d-flex justify-content-evenly align-items-center">
                                        <a class="btn btn-primary btn-sm" type="button"
                                            href="{{  route('admin.feedback.detail', ['id'=> $r->id], absolute:false)  }}">View</a>
                                    </td>
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
