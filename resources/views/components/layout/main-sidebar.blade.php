<x-layout.main :title="$title">
    @push('styles')
        <style>
            .main-content {
                /* margin-left: 250px; */
                transition: all 0.3s ease-out!important;
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
