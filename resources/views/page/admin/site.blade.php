<x-layout.main-sidebar title="Admin | Site">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm mt-3">
                <h3 class="text-start text-decoration-underline">Site</h3>
                <p>Turn your site on/off, make sure no critical process still running.</p>
                <div class="d-flex gap-3">
                    <form action="{{ route('do.admin.upSite') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary ">Turn OFF Maintenance Mode</button>
                    </form>
                    <form action="{{ route('do.admin.downSite') }}" method="POST" id="formOff">
                        @csrf
                        <button type="submit" class="btn btn-danger ">Turn ON Maintenance Mode</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('script')
    <script>
        const formOff = document.querySelector('#formOff');
        if (formDelete) {
            formOff.addEventListener('submit', (e) => {
                e.preventDefault();
                swal2(() => f.submit(), {text: "User Cannot Acces Your Site", confirmButtonText: "Yes!"});
                return false;
            });

        }
    </script>
    @endpush
</x-layout.main-sidebar>
