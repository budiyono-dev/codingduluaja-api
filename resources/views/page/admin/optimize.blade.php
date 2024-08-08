<x-layout.main-sidebar title="Admin | Optimize">
    <div class="row justify-content-center mt-3">
        <div class="col-sm">
            <div class="card shadow">
                <div class="card-header">
                    <h4 class="text-center m-0">Action</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.optimize.optimize') }}" class="my-3 d-block" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="selOptimize" class="form-label">Command</label>
                            <select class="form-select" aria-label="Default select example" name="selOptimize"
                                id="selOptimize" required>
                                <option value="" selected>Pilih command</option>
                                <option value="optimize">Optimize</option>
                                <option value="optimize_clear">Optimize:clear</option>
                                <option value="token_hk">Token House Keeping</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Execute</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm col-md-8">
            <div class="card shadow">
                <div class="card-header">
                    <h4 class="text-center m-0">Console Output</h4>
                </div>
                <div class="card-body">
                    <textarea name="areaOutput" id="areaOutput" rows="15"
                    class="my-3 border p-2 border-primary border-1 fs-6"
                    style="width: 100%;">{{ session('command-output') ?? '' }}</textarea>
                </div>
            </div>
        </div>
    </div>
</x-layout.main-sidebar>
