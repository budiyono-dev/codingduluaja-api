<x-layout.main-sidebar title="Admin | Menu Access">
    <div class="row mt-3 justify-content-center">
        <div class="col">
            <div class="card shadow">
                <form action="{{ route('admin.menuAccess.doCreate', absolute:false) }}" method="POST">
                    <div class="card-header d-flex gap-3">
                        <h4 class="m-0">Edit Menu Access</h4>
                        <button class="btn btn-primary btn-sm px-3" type="submit">Save</button>
                    </div>
                    <div class="card-body">
                        @csrf
                        <div class="mb-3">
                            <label for="menuAccesName" class="form-label">Menu Access Name</label>
                            <input type="text" name="txtName" class="form-control" id="menuAccesName" placeholder="user menu access name">
                        </div>
                        <div class="mb-3">
                            <label for="menuAccesDesc" class="form-label">Menu Access Description</label>
                            <textarea class="form-control" name="txtDescription" id="menuAccesDesc" rows="3"></textarea>
                        </div>
                        <div class="d-flex my-3">
                            <h2 class="m-0 fs-5">Menu Items</h2>
                            <button class="btn btn-sm btn-success ms-3 px-3"
                                    type="button" onclick="selectAll(this)">Select All</button>
                        </div>
                        <div class="list-group">
                            @forelse ($menuParent as $key => $p)
                                @if ($p->id === 1)
                                    @continue
                                @endif
                                <a class="list-group-item list-group-item-action list-group-item-primary"
                                    data-bs-toggle="collapse" href="{{ '#collapse' . $key }}">
                                    {{ __($p->name) }}
                                </a>
                                <ul class="list-group collapse" id="{{ 'collapse' . $key }}">
                                    <li class="list-group-item list-group-item-warning">
                                        <button class="btn btn-sm btn-success me-3" type="button"
                                            onclick="selectAllItems(this)">Select All</button>
                                    </li>
                                    @forelse ($p->menuItem as $item)
                                        <li class="list-group-item list-group-item-warning">
                                            <input class="form-check-input items-check-box" type="checkbox" name="cbItems[]"
                                                id="{{ 'menuItem' . $item->id }}" value="{{ $item->id }}">
                                            <label class="form-check-label"
                                                for="{{ 'menuItem' . $item->id }}">{{ __($item->name) }}</label>
                                        </li>
                                    @empty
                                        <p>No Data....</p>
                                    @endforelse
                                </ul>
                            @empty
                                <p>No Data....</p>
                            @endforelse
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @push('script')
        <script>
            function resetAllCheckboxes() {
                document.querySelectorAll(".items-check-box").forEach(el => el.checked = false);
            }
            resetAllCheckboxes();

            function selectAll(e) {
                let txt = e.innerText;
                if (txt === 'Select All') {
                    document.querySelectorAll(".items-check-box").forEach(el => el.checked = true);
                    e.innerText = 'Unselect All';
                } else {
                    document.querySelectorAll(".items-check-box").forEach(el => el.checked = false);
                    e.innerText = 'Select All';
                }
            }

            function selectAllItems(e) {
                let txt = e.innerText;
                let cbInputs = e.parentElement.parentElement.querySelectorAll('.list-group-item>input');

                if (txt === 'Select All') {
                    cbInputs.forEach(el => el.checked = true);
                    e.innerText = 'Unselect All';
                } else {
                    cbInputs.forEach(el => el.checked = false);
                    e.innerText = 'Select All';
                }
            }
        </script>
    @endpush
</x-layout.main-sidebar>
