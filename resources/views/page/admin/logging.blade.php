<x-layout.main-sidebar title="Admin | Logging">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm mt-3">
                <h3 class="text-start m-0 text-decoration-underline">Download Logs</h3>
                <form action="{{ route('admin.logging.download') }}" class="my-3 d-block" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Download</button>
                </form>
            </div>
        </div>
    </div>
</x-layout.main-sidebar>
