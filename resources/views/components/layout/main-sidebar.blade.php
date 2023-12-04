<x-layout.main :title="$title">
    <x-side-bar />
    <div id="main" class="container-fluid main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col text-center">
                    <x-nav-bar />
                </div>
            </div>
            {{ $slot }}

        </div>
    </div>
    @push('script')
        <script type="module">
            import {
                toggleSidebar
            } from "{{ Vite::asset('resources/js/app.js') }}"
            document.getElementById('btn-toggle-sidebar').addEventListener('click', toggleSidebar);
        </script>
    @endpush
</x-layout.main>
