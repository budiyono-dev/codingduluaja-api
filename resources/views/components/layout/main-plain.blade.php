<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title> {{ $title }}</title>
    @stack('styles')
</head>

<body>
    {{ $slot }}
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="simple-toast" class="toast align-items-center border-0" role="alert" aria-live="assertive"
            aria-atomic="true" data-bs-delay="5000">
            <div class="d-flex">
                <div id="simple-toast-msg" class="toast-body">
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const simpleToast = document.getElementById('simple-toast');
        const toastSimpleB = bootstrap.Toast.getOrCreateInstance(simpleToast);
        let localTheme = localStorage.getItem("theme");

        function getBgColor(type) {
            const bgColor = {
                'info': 'text-bg-info',
                'primary': 'text-bg-primary',
                'secondary': 'text-bg-secondary',
                'success': 'text-bg-success',
                'danger': 'text-bg-danger',
                'black': 'text-bg-black',
                'white': 'text-bg-white',
                'default': 'text-bg-primary'
            };
            return (bgColor[type] || bgColor['default']);
        }

        function showSimpleToast(msg = 'nofitication', type) {

            let bgColour = getBgColor(type);
            simpleToast.classList.forEach(className => {
                if (className.includes('text-bg')) {
                    simpleToast.classList.remove(className);
                }
            });
            simpleToast.classList.add(bgColour);
            document.getElementById('simple-toast-msg').innerHTML = msg;
            toastSimpleB.show();
        }

        function changeTheme(theme) {
            let a = document.querySelectorAll("[data-bs-theme]");
            a.forEach(e => e.dataset.bsTheme = theme);

            if (theme === 'dark') {
                document.querySelectorAll('.link-dark').forEach(b => {
                    b.classList.remove('link-dark');
                    b.classList.add('link-light');
                });
            } else {
                document.querySelectorAll('.link-light').forEach(b => {
                    b.classList.remove('link-light');
                    b.classList.add('link-dark');
                });
            }
            console.log('set theme to localstorage', theme);
            localStorage.setItem("theme", theme);

        }

        function toggleDarkMode() {
            const current = document.documentElement.getAttribute('data-bs-theme');
            let finalTheme = current === 'dark' ? 'light' : 'dark';
            changeTheme(finalTheme);
        }

        const errMsg = {!! json_encode($errors->all()) !!};
        if (errMsg.length > 0) {
            showSimpleToast(errMsg.join('<br>'), 'danger');
        }

        const statusMessage = {!! json_encode(session('status')) !!};
        if (statusMessage) {
            const msgSts = statusMessage.split('|');
            if (msgSts.length > 1) {
                showSimpleToast(msgSts[0], msgSts[1]);
            } else {
                showSimpleToast(statusMessage, 'success');
            }
        }

        if (localTheme) {
            const current = document.documentElement.getAttribute('data-bs-theme');
            if (localTheme !== current) {
                changeTheme(localTheme);
            }

        }

        function swal2(callback, fireParams = {}) {
            Swal.fire({
                title: "Are you sure?",
                text: fireParams.text ?? "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: fireParams.confirmButtonText ?? "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    callback();
                }
            });
        }
    </script>
    @stack('script')
</body>

</html>
