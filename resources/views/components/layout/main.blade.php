<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <title> {{ $title }}</title>
    @stack('styles')
</head>

<body>
    {{ $slot }}
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    @stack('script')
    @stack('addEventListener')
</body>

</html>