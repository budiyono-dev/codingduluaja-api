<x-layout.main-sidebar title="Admin | Feedback Detail">
    @push('styles')
    <style>
        img {
            height: auto;
            width: 20%;
            object-fit: contain;
        }
    </style>
    @endpush
    <div class="row">
        <div class="col">
            <div class="card mt-3 shadow">
                <div class="card-header">
                    <h4 class="m-0">Kritik, Saran dan Pengaduan</h4>
                </div>
                <div class="card-body">
                    <h5>Judul : {{$report->title}}</h5>
                    <h5>Reporter : {{$report->user->name}}</h5>
                    <h5>Category : {{$report->category}}</h5>
                    <div class="card shadow my-3">
                        <div class="card-body">
                            {!! $report->payload !!}
                        </div>
                    </div>
                    <div class="lampiran">
                        @forelse ($report->image as $img)
                            <img src="{{ asset('img/'.$img->image) }}" alt="{{ $img->image }}" width="500" height="600">
                        @empty
                            <p>Tidak Ada Lampiran</p>
                        @endforelse
                    </div>
                </div>
                <div class="card-footer">
                    <span>created_at : {{$report->created_at}}, updated_at : {{$report->updated_at}}</span>
                </div>
            </div>
        </div>
    </div>
</x-layout.main-sidebar>

