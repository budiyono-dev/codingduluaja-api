<x-layout.main-sidebar title="Home">
    Add Resource

    <button type="button" class="btn btn-primary btn-lg" id="btnCreateToken">
        Create Token
    </button>

    @push('script')
        <script>
            const createToken = async (el) => {
                try {
                    const res = await fetch("{{ route('do.createToken') }}");
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
