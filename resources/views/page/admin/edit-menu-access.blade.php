<x-layout.main-sidebar title="Admin | Menu Access">
    <div class="container">
        <section class="my-3 d-flex">
            <h2>Edit Menu Access</h2>
            <button class="btn btn-outline-primary mx-3 px-5" type="button">Save</button>
        </section>
        <section>
            <div class="mb-3">
                <label for="menuAccesName" class="form-label">Menu Access Name</label>
                <input type="text" class="form-control" id="menuAccesName" value={{ $menuAccess->name }}>
            </div>
            <div class="mb-3">
                <label for="menuAccesDesc" class="form-label">Menu Access Description</label>
                <textarea class="form-control" id="menuAccesDesc" rows="3">{{ $menuAccess->description }}</textarea>
            </div>
        </section>
        <section>
            <h2>Menu Items</h2>
            <div class="list-group">
                @forelse ($menuParent as $key => $p)
                    <a class="list-group-item list-group-item-action list-group-item-primary" data-bs-toggle="collapse"
                        href={{ '#collapse' . $key }}>{{ __($p->name) }}</a>
                    <ul class="list-group collapse" id={{ 'collapse' . $key }}>
                        @forelse ($p->menuItem as $item)
                            <li class="list-group-item list-group-item-warning">
                                <input class="form-check-input items-check-box" type="checkbox" id={{ 'menuItem' . $item->id }}>
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

        {{-- <div class="row justify-content-center">
            <div class="col">
                <div class="table-responsive ">
                    <table class="table table-sm  table-hover table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Menu Parent</th>
                                <th scope="col" class="text-center">Enabled</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="loadingMenuParent">
                                <td colspan="3" class="text-center">
                                    <div class="spinner-border spinner-border-sm" role="status" id="loadingSpinner">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </td>
                            </tr>
                            @forelse ($menuParent as $key => $p)
                                <tr onclick="show({{ $p }})">
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td class="text-start">{{ __($p->name) }}</td>
                                    <td class="text-center">
                                        <input class="form-check-input border-secondary" type="checkbox">
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No Data....</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col">
                <div class="table-responsive ">
                    <table class="table table-sm  table-hover table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Menu Item</th>
                                <th scope="col" class="text-center">Enabled</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="loadingMenuItem">
                                <td colspan="3" class="text-center">
                                    <div class="spinner-border spinner-border-sm" role="status" id="loadingSpinner">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </td>
                            </tr>
                            @forelse ($menuItem as $key => $it)
                                <tr onclick="show({{ $it }})" class="d-none">
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td class="text-start">{{ __($it->name) }}</td>
                                    <td class="text-center">
                                        <input class="form-check-input border-secondary" type="checkbox">
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No Data....</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div> --}}
    </div>
    @push('script')
        <script>
            function resetAllCheckboxes() {
                document.querySelectorAll(".items-check-box").forEach(el => el.checked = false);
            }
            resetAllCheckboxes();
            const activatedMenu = {!! json_encode($activatedMenu) !!}
            if (activatedMenu && activatedMenu.length > 0) {
                activatedMenu.forEach(el => {
                    console.log("aada actibe menu");
                    document.getElementById(`menuItem${el}`).checked = true;
                });
            }
        </script>
    @endpush
</x-layout.main-sidebar>
