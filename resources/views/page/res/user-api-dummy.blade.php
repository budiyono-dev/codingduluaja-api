<x-layout.main-sidebar title="Resource | User Api">
    <div class="row">
        <div class="col-lg-6">
            <div class="card mt-3 shadow">
                <div class="card-header">
                    <h4 class="m-0">Generate Random User</h4>
                </div>
                <div class="card-body">
                    <form name="formGenerateUser" id="formGenerateUser" method="post"
                        action="{{ route('res.userApi.dummy', absolute:false) }}" autocomplete="off">
                        @csrf
                        <select class="form-select mb-3" name="sel_qty" id="selSearchBy" required>
                            <option selected value="">-- Select Qty --</option>
                            <option value="1">1</option>
                            <option value="3">3</option>
                            <option value="5">5</option>
                        </select>
                        <button type="submit" class="btn-primary btn w-100">
                            Generate
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout.main-sidebar>
