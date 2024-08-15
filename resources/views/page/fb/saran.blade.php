{{-- <x-layout.main-sidebar title="Tools | Base64">
    <div class="row">
        <div class="col">
            <h1>Kritik, Saran dan Pengaduan</h1>
        </div>
    </div>
    @push('script')
    <script type="text/javascript">
        
    </script>
    @endpush
</x-layout.main-sidebar> --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CKE5 in Laravel</title>
    <script src="{{ asset('assets/js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            promotion: false,
            selector: 'textarea#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
            plugins: 'code table lists',
            toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
        });
    </script>

</head>

<body>
    <form method="POST" action="{{ route('feedback.report.post',absolute:false)}}">
        @csrf
        <textarea id="myeditorinstance" name="mceInput">Hello, World!</textarea>
        <button>submit</button>
    </form>
</body>

</html>
