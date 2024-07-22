<x-layout.main-sidebar title="Admin | Site">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm mt-3">
                <h3 class="text-start text-decoration-underline">Site</h3>
                <p>Turn your site on/off, make sure no critical process still running.</p>
                <div class="d-flex gap-3">
                    @if($isDown)
                    <form action="{{ route('do.admin.site.up') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary @disabled(!$isDown)">Turn OFF Maintenance Mode</button>
                    </form>
                    @endif
                    
                    @if(!$isDown)
                    <form action="{{ route('do.admin.site.down') }}" method="POST" id="formOff">
                        @csrf
                        <button type="submit" class="btn btn-danger @disabled($isDown)">Turn ON Maintenance Mode</button>
                    </form>
                    @endif
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
