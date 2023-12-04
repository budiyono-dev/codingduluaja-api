<x-layout.main-sidebar title="Home">
    <h1 class="text-center">Dashboard</h1>

    @push('addEventListener')
        <script type="text/javascript">
            document.getElementById('btnCreateToken').addEventListener('click', createToken);
        </script>
    @endpush
</x-layout.main-sidebar>
