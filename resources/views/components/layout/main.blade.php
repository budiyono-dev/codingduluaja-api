<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title> {{ $title }}</title>
    <style>
        html,
        body {
            height: 100%;
        }
    </style>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script>
        const simpleToast = document.getElementById('simple-toast');
        const toastSimpleB = bootstrap.Toast.getOrCreateInstance(simpleToast)
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');


        // ============= GLOBAL FUNCTION =================

        // show simple toas
        const showSimpleToast = (msg = 'nofitication', type) => {
            let bgColour = 'text-bg-danger';
            if (type === 'info') {
                bgColour = 'text-bg-primary';
            }
            simpleToast.classList.forEach(className => {
                if (className.includes('text-bg')) {
                    simpleToast.classList.remove(className);
                }
            });
            simpleToast.classList.add(bgColour);
            document.getElementById('simple-toast-msg').innerHTML = msg;
            toastSimpleB.show();
        }

        // ============== Document Ready Function ================

        // show error if exist     
        const errMsg = {!! json_encode($errors->all()) !!};
        if (errMsg.length > 0) {
            showSimpleToast(errMsg.join('<br>'));
        }
    </script>
    @stack('script')
    @stack('addEventListener')
</body>

</html>
