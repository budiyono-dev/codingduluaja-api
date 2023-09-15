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

        .cursor-pointer {
            cursor: pointer;
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

    <div
        class="modal fade"
        id="modals"
        {{-- data-bs-backdrop="static" --}}
        data-bs-keyboard="false"
        tabindex="-1"
        {{-- aria-labelledby="staticBackdropLabel" --}}
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content d-flex justify-content-center align-items-center">
                <div class="modal-header w-100">
                    <h1 class="modal-title fs-5 m-auto" id="staticBackdropLabel">Confirmation</h1>
                </div>
                <div class="modal-body d-flex align-items-center">
                    <p class="mb-0" id="confirmationMsg">????</p>
                </div>
                <div class="modal-footer w-100">
                    <x-button type="submit" class="btn-danger w-100" id="btnConfirmYes">
                        OK!
                    </x-button>
                </div>
            </>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script>
        const simpleToast = document.getElementById('simple-toast');
        const toastSimpleB = bootstrap.Toast.getOrCreateInstance(simpleToast)
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const myModalAlternative = new bootstrap.Modal('#modals', { keyboard: false });
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
        let resolveGlobal;


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

        const deleteConfirmation = (callback, msg = 'Are you sure?', buttonType) => {
            let promise = new Promise(function(resolve, reject) {
                        let confirmValue = true;
                        resolveGlobal = resolve;
                        document.getElementById('confirmationMsg').innerHTML = msg;
                        document.getElementById('btnConfirmYes').innerHTML = 'YES';
                        myModalAlternative.show();
                    });
            promise.then(data => {
                if (data) {
                    callback();
                }
            });
        }
        const modalsFunc = () => {
            resolveGlobal(false);
        }
        const confirmationYes = () => {
            resolveGlobal(true);
        }
        

        // ============== Document Ready Function ================

        // show error if exist     
        const errMsg = {!! json_encode($errors->all()) !!};
        if (errMsg.length > 0) {
            showSimpleToast(errMsg.join('<br>'));
        }

        // ============== Global Event Listener ================
        document.getElementById('modals').addEventListener('hide.bs.modal', modalsFunc);
        document.getElementById('btnConfirmYes').addEventListener('click', confirmationYes);

    </script>
    @stack('script')
    @stack('addEventListener')
</body>

</html>
