<x-layout.main :title="$title">
    @push('styles')
        <style>
            .main-content {
                /* margin-left: 250px; */
                transition: all 0.3s ease-out !important;
                /* padding: 20px; */
                width: 100%
            }

            .toggle-main-content {
                padding-left: 250px;
                /* transition: all 0.3s ease-out!important; */
            }
        </style>
    @endpush

    {{-- ============ Component HTML START ======== --}}
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
            document.getElementById('btnDarkMode').addEventListener('click', toggleDarkMode);
        </script>
    @endpush
</x-layout.main>
