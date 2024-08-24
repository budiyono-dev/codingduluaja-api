<x-layout.main-sidebar title="Admin | Logging">
    <div class="row mt-3">
        <div class="col-sm ms-3">
            <h3 class="text-start m-0 text-decoration-underline">Download Logs</h3>
            <form action="{{ route('admin.logging.download',absolute:false) }}" class="my-3 d-block" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">Download</button>
            </form>
        </div>
    </div>
</x-layout.main-sidebar>
