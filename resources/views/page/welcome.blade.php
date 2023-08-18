<x-layout.main-sidebar title="Home">
    Add Resource

    <button type="button" class="btn btn-primary btn-lg" id="btnCreateToken">
        Create Token
    </button>
    <form method="POST" action="{{ route('do.createApp') }}">
    </form>

    @push('script')
        <script>
            const createToken = async (el) => {
                try {
                    
                    const res = await fetch("{{ route('do.createToken') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-Token': csrfToken
                        },
                        body: JSON.stringify({applicationId: "idOfApplication"})

                    });
                    const jsonRes = await res.json();
                    console.log(jsonRes);
                } catch (e) {
                    log.error('error', e);
                }
            }
        </script>
    @endpush
    @push('addEventListener')
        <script type="text/javascript">
            document.getElementById('btnCreateToken').addEventListener('click', createToken);
        </script>
    @endpush
</x-layout.main-sidebar>
