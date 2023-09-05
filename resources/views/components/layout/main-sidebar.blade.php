<x-layout.main :title="$title">
    @push('styles')
        <style>
            .main-content {
                /* margin-left: 250px; */
                transition: all 0.3s ease-out;
                /* padding: 20px; */
            }

            .toggle-main-content {
                margin-left: 250px
            }
        </style>
    @endpush

    {{-- ============ Component HTML START ======== --}}
    <x-side-bar />
    <div id="main" class="main-content">
        <div class="row">
            <div class="col text-center border border-dark">
                <x-nav-bar />
            </div>
        </div>
        {{ $slot }}
    </div>
    {{-- ============ Component HTML END ======== --}}

    @push('script')
        <script type="text/javascript">
            const toggleSidebar = () => {
                document.getElementById('sidebar').classList.toggle('sidebarshow');
                document.getElementById('main').classList.toggle('toggle-main-content');
            }
        </script>
    @endpush
    @push('addEventListener')
        <script type="text/javascript">
            document.getElementById('btn-toggle-sidebar').addEventListener('click', toggleSidebar);
        </script>
    @endpush
</x-layout.main>
