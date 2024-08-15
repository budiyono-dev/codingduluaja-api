<x-layout.main-sidebar title="Tools | Base64">
    <div class="row">
        <div class="col">
            <div class="card mt-3 shadow">
                <div class="card-header">
                    <h4 class="m-0">Kritik, Saran dan Pengaduan</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('feedback.report.post',absolute:false)}}">
                        @csrf
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" required>
                        </div>
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select class="form-select mb-3" name="kategori" id="kategori" required>
                                <option selected value="">-- Pilih Kategori --</option>
                                <option value="pengaduan">Pengaduan</option>
                                <option value="saran">Saran</option>
                            </select>
                        </div>
                        <textarea id="payloadSaran" name="payload_saran" required>Sudah ngonding apa saja hari ini?</textarea>
                        <div class="my-3">
                          <label for="gambar" class="form-label">Upload Gambar</label>
                          <input class="form-control" type="file" id="gambar" name="gambar[]" multiple>
                        </div>
                        <button class="btn btn-primary px-2 py-1 my-3">submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('script')
    <script src="{{ asset('assets/js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            promotion: false,
            menubar: false,
            branding: false,
            elementpath: true,
            selector: 'textarea#payloadSaran', // Replace this CSS selector to match the placeholder element for TinyMCE
            plugins: 'code table lists',
            toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | table'
        });
    </script>
    @endpush
</x-layout.main-sidebar>

