<x-layout.main-sidebar title="Admin | Feedback Detail">
    @push('styles')
        <style>
            img {
                height: auto;
                width: 20%;
                object-fit: contain;
            }

            .td-wid {
                min-width: 100px;
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
                    <table>
                        <tr>
                            <td class="td-wid">Judul</td>
                            <td>: {{ $report->title }}</td>
                        </tr>
                        <tr>
                            <td class="td-wid">Reporter</td>
                            <td>: {{ $report->user->name }}</td>
                        </tr>
                        <tr>
                            <td class="td-wid">Category</td>
                            <td>: {{ $report->category }}</td>
                        </tr>
                        <tr>
                            <td class="td-wid">created at</td>
                            <td>: {{ $report->created_at }}</td>
                        </tr>
                        <tr>
                            <td class="td-wid">updated at</td>
                            <td>: {{ $report->updated_at }}</td>
                        </tr>
                    </table>
                    <div class="isi border p-3 my-3">
                        {!! $report->payload !!}
                    </div>
                    <div class="lampiran">
                        @forelse ($report->image as $img)
                            <a href="{{ asset('img/' . $img->image) }}" target="_blank">
                                <img src="{{ asset('img/' . $img->image) }}" alt="{{ $img->image }}"
                                    class="img-thumbnail rounded">
                            </a>
                        @empty
                            <p>Tidak Ada Lampiran</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout.main-sidebar>
