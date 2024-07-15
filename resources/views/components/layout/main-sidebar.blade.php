<x-layout.main-plain :title="$title">
    @push('styles')
        <style>
            .main-content {
                transition: all 0.3s ease-out !important;
                width: 100%
            }

            .toggle-main-content {
                padding-left: 250px;
            }

            .cursor-pointer {
                cursor: pointer;
            }

            .left-sidebar {
                width: 235px;
                position: fixed;
                top: 0;
                left: -235px;
                height: 100%;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
                padding-top: 90px;
                transition: all 0.3s ease-out;
                box-sizing: border-box;
            }

            .sidebarshow {
                left: 0;
            }

            .btn-toggle {
                display: inline-flex;
                align-items: center;
                padding: .25rem .5rem;
                font-weight: 600;
                border: 0;

                &:hover, &:focus {
                    color: rgba(0, 0, 0, .85);
                    background-color: #d2f4ea;
                }
            }

            .btn-toggle-nav a {
                display: inline-flex;
                padding: .1875rem .5rem;
                text-decoration: none;
                
                &:hover, &:focus {
                    background-color: #d2f4ea;
                    color: black;
                }
            }

            .hover-primary {
                cursor: pointer;
                
                &:hover, &:focus {
                    background-color: #d2f4ea;
                }
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
        <script>
            const toggleSidebar = () => {
                document.getElementById('sidebar').classList.toggle('sidebarshow');
                document.getElementById('main').classList.toggle('toggle-main-content');
            }
            document.getElementById('btn-toggle-sidebar').addEventListener('click', toggleSidebar);
            document.getElementById('btnDarkMode').addEventListener('click', toggleDarkMode);
        </script>
    @endpush
</x-layout.main-plain >
