<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <style>
    </style>
    @stack('styles')
</head>

<body>
    {{ $slot }}
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
