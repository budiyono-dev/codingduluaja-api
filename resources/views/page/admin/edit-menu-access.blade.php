<x-layout.main-sidebar title="Admin | Menu Access">
    <div class="container">
        <form action={{ route('do.admin.editMenuAccess') }} method="POST">
            @csrf
            <input type="hidden" name="id" value={{ $menuAccess->id }}>
            <section class="my-5 d-flex justify-content-between">
                <h2 class="fs-4">Edit Menu Access</h2>
                <button class="btn btn-primary mx-3 px-5" type="submit">Save</button>
            </section>
            <section>
                <div class="mb-3">
                    <label for="menuAccesName" class="form-label">Menu Access Name</label>
                    <input type="text" name="txtName" class="form-control" id="menuAccesName" readonly
                        value={{ $menuAccess->name }}>
                </div>
                <div class="mb-3">
                    <label for="menuAccesDesc" class="form-label">Menu Access Description</label>
                    <textarea class="form-control" name="txtDescription" id="menuAccesDesc" rows="3">{{ $menuAccess->description }}</textarea>
                </div>
            </section>
            <section>
                <div class="d-flex my-3">
                    <h2 class="m-0 fs-5">Menu Items</h2>
                    <button class="btn btn-sm btn-success ms-3 px-3" type="button" onclick="selectAll(this)">select
                        all</button>
                </div>
                <div class="list-group">
                    @forelse ($menuParent as $key => $p)
                        @if ($p->id === 1)
                            @continue
                        @endif
                        <a class="list-group-item list-group-item-action list-group-item-primary"
                            data-bs-toggle="collapse" href={{ '#collapse' . $key }}>
                            {{ __($p->name) }}
                        </a>
                        <ul class="list-group collapse" id={{ 'collapse' . $key }}>
                            <li class="list-group-item list-group-item-warning">
                                <button class="btn btn-sm btn-success me-3" type="button"
                                    onclick="selectAllItems(this)">select all</button>
                            </li>
                            @forelse ($p->menuItem as $item)
                                <li class="list-group-item list-group-item-warning">
                                    <input class="form-check-input items-check-box" type="checkbox" name="cbItems[]"
                                        id={{ 'menuItem' . $item->id }} value={{ $item->id }}>
                                    <label class="form-check-label"
                                        for={{ 'menuItem' . $item->id }}>{{ __($item->name) }}</label>
                                </li>
                            @empty
                                <p>No Data....</p>
                            @endforelse
                        </ul>
                    @empty
                        <p>No Data....</p>
                    @endforelse
                </div>
            </section>
        </form>
    </div>
    @push('script')
        <script>
            const activatedMenu = {!! json_encode($activatedMenu) !!}
            
            function resetAllCheckboxes() {
                document.querySelectorAll(".items-check-box").forEach(el => el.checked = false);
            }
            resetAllCheckboxes();
            
            if (activatedMenu && activatedMenu.length > 0) {
                activatedMenu.forEach(el => {
                    let item = document.getElementById(`menuItem${el}`);
                    if (item) item.checked = true;
                });
            }

            function selectAll(e) {
                let txt = e.innerText;
                if (txt === 'select all') {
                    document.querySelectorAll(".items-check-box").forEach(el => el.checked = true);
                    e.innerText = 'unselect all';
                } else {
                    document.querySelectorAll(".items-check-box").forEach(el => el.checked = false);
                    e.innerText = 'select all';
                }
            }

            function selectAllItems(e) {
                let txt = e.innerText;
                let cbInputs = e.parentElement.parentElement.querySelectorAll('.list-group-item>input');

                if (txt === 'select all') {
                    cbInputs.forEach(el => el.checked = true);
                    e.innerText = 'unselect all';
                } else {
                    cbInputs.forEach(el => el.checked = false);
                    e.innerText = 'select all';
                }
            }
        </script>
    @endpush
</x-layout.main-sidebar>