<x-layout.main-sidebar title="Admin | Migration">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm mt-3">
                <h3 class="text-center m-0 text-decoration-underline">Action</h3>
                <form action="" class="my-3 d-block">
                    <div class="mb-3">
                        <label for="selMigrate" class="form-label">Migrations</label>
                        <select class="form-select" aria-label="Default select example" name="selMigrate"
                            id="selMigrate">
                            <option value="" selected>Pilih Action</option>
                            <option value="migrate:fresh">mirate:fresh</option>
                            <option value="migrate">migrate</option>
                            <option value="rolback">rollback</option>
                            <option value="seed">seed</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">execute</button>
                </form>
                <div class="text-secondary">
                    <hr class="border border-secondary border-2">
                </div>

                <form action="" class="my-3 d-block">
                    <div class="mb-3">
                        <label for="selMigrate" class="form-label">Seeder</label>
                        <select class="form-select" aria-label="Default select example" name="selMigrate"
                            id="selMigrate">
                            <option value="" selected>Pilih Seeder</option>
                            <option value="DevelopmentSeeder">Development</option>
                            <option value="AllWilayahSeeder">All Wilayah</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">execute</button>
                </form>
                <div class="text-secondary">
                    <hr class="border border-secondary border-2">
                </div>

                <form action="" class="my-3 d-block">
                    <div class="mb-3">
                        <label for="selMigrate" class="form-label">Maintenance</label>
                        <select class="form-select" aria-label="Default select example" name="selMigrate"
                            id="selMigrate">
                            <option value="" selected>Pilih Action</option>
                            <option value="down">down (Maintanance Mode)</option>
                            <option value="up">up (disable Maintance Mode)</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">execute</button>
                </form>
                <div class="text-secondary">
                    <hr class="border border-secondary border-2">
                </div>
            </div>
            <div class="col-sm mt-3">
                <h3 class="text-center  m-0  text-decoration-underline">Console Output</h3>
                <textarea name="areaOutput" id="areaOutput" rows="15" class="my-3 border p-2 border-primary border-1"
                    style="width: 100%">{{ session('command-output') ?? '' }}</textarea>
            </div>
        </div>
    </div>
    @push('script')
        <script type="text/javascript"></script>
    @endpush
</x-layout.main-sidebar>
