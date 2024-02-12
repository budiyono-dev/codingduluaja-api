<x-layout.main title="Admin Console">
    <div class="container text-center">
        <h1 class="p-3">Admin Console</h1>
        <form action="{{ route('do.su.action', ['id' => $id]) }}" method="post" autocomplete="off"
            class="w-50 m-auto my-3 " id="formActionSu">
            @csrf
            <div class="input-group mb-3">
                <select name="sel_action" id="selAction" class="form-select">
                    <option value="" selected>Pilih Action</option>
                    <option value="migrate:fresh">mirate:fresh</option>
                    <option value="migrate">migrate</option>
                    <option value="down">down (Maintanance Mode)</option>
                    <option value="up">up (disable Maintance Mode)</option>
                    <option value="seed">seed</option>
                </select>
                <select name="sel_seed_class" id="selSeedClass" class="form-select" disabled>
                    <option value="" selected>Pilih Seeder Class</option>
                    <option value="DevelopmentSeeder">Development</option>
                    <option value="AllWilayahSeeder">All Wilayah</option>
                </select>
                <button class="btn btn-outline-primary btn-sm">Do Action</button>
            </div>
        </form>
        <textarea name="areaOutput" id="areaOutput" rows="15" class="my-3 border p-2" style="width: 100%">{{ session('command-output') ?? '' }}</textarea>
    </div>
    @push('script')
        <script>
            document.getElementById('formActionSu').addEventListener('submit', (event) => {
                event.preventDefault();
                if (!document.getElementById('selAction')?.value) {
                    return;
                }
                event.target.submit();
            });
            document.getElementById('selAction').addEventListener('change', (event) => {
                if(event.target?.value === 'seed') {
                    document.getElementById('selSeedClass').disabled = false;
                } else {
                    document.getElementById('selSeedClass').value = '';
                    document.getElementById('selSeedClass').disabled = true;
                }
            });
        </script>
    @endpush
</x-layout.main>
