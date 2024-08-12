<x-layout.main-sidebar :title="$title">
    @push('styles')
    <script src="{{ asset('assets/hjs/highlight.min.js') }}"></script>
    <script src="{{ asset('assets/hjs/json.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/hjs/github-dark.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/doc.css') }}">
    <script>
        hljs.highlightAll();
    </script>
    @endpush
    <div class="row">
        <div class="col-3 border-end d-none d-md-block">
            <ul id="daftar-isi"></ul>
        </div>
        <div class="col col-md-9 ps-3 main-doc">
            {{ $slot }}
        </div>
    </div>
    @push('script')
    <script src="{{ asset('assets/js/doc.js') }}"></script>
    @endpush
</x-layout.main-sidebar>

