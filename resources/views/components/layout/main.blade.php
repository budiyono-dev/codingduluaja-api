<!doctype html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <title> {{ $title }}</title>
    @stack('styles')
    @vite('resources/css/app.css')
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

    <div class="modal fade" id="modals" {{-- data-bs-backdrop="static" --}} data-bs-keyboard="false" tabindex="-1"
        {{-- aria-labelledby="staticBackdropLabel" --}} aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content d-flex justify-content-center align-items-center">
                <div class="modal-header w-100">
                    <h1 class="modal-title fs-5 m-auto" id="staticBackdropLabel">Confirmation</h1>
                </div>
                <div class="modal-body d-flex align-items-center">
                    <p class="mb-0" id="confirmationMsg">????</p>
                </div>
                <div class="modal-footer w-100">
                    <x-button type="submit" class="btn-outline-danger w-100" id="btnConfirmYes">
                        OK!
                    </x-button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    @vite('resources/js/app.js')
    <script type="module">
        import {
            refreshTooltips,
            showSimpleToast
        } from "{{ Vite::asset('resources/js/app.js') }}"

        const errMsg = {!! json_encode($errors->all()) !!};
        let localTheme = localStorage.getItem("theme");

        refreshTooltips();

        if (errMsg.length > 0) {
            showSimpleToast(errMsg.join('<br>'));
        }
        if (localTheme) {
            const current = document.documentElement.getAttribute('data-bs-theme');
            if (localTheme !== current) {
                changeTheme(localTheme);
            }

        }
    </script>
    @stack('script')
    @stack('addEventListener')
</body>

</html>
