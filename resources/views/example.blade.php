<x-layout.main-plain title="Documentation | Todolist">
    @push('styles')
    <script src="{{ asset('assets/hjs/highlight.min.js') }}"></script>
    <script src="{{ asset('assets/hjs/json.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/hjs/github-dark.min.css') }}">
    <script>
        hljs.highlightAll();
    </script>
    @endpush
        
    @markdown
    # Bar
    ## Hello
    ```json
    {
        "message": "hai"
    }
    ```
    @endmarkdown
</x-layout.main-plain>
