<x-layout.main-sidebar title="Admin | Migration">
    <div class="row justify-content-center mt-3">
        <div class="col-sm">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center m-0">Action</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.migration.migrate') }}" class="my-3 d-block" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="selMigrate" class="form-label">Migrations</label>
                            <select class="form-select" aria-label="Default select example" name="selMigrate"
                                id="selMigrate">
                                <option value="" selected>Pilih Action</option>
                                <option value="fresh">fresh</option>
                                <option value="migrate">migrate</option>
                                <option value="rolback">rollback</option>
                                <option value="status">status</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Execute</button>
                    </form>
                    <div class="text-secondary">
                        <hr class="border border-secondary border-2">
                    </div>
        
                    <form action="{{ route('admin.migration.seed') }}" class="my-3 d-block" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="selSeed" class="form-label">Seeder</label>
                            <select class="form-select" aria-label="Default select example" name="selSeed"
                                id="selMigrate">
                                <option value="" selected>Pilih Seeder</option>
                                <option value="DevelopmentSeeder">Development</option>
                                <option value="AllWilayahSeeder">All Wilayah</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Execute</button>
                    </form>
                    <div class="text-secondary">
                        <hr class="border border-secondary border-2">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm col-md-8">
            <div class="card">
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
