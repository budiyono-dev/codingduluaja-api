<!doctype html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('assets/hjs/highlight.min.js') }}"></script>
    <script src="{{ asset('assets/hjs/json.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/hjs/github-dark.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bs/css/bootstrap.min.css') }}">
    <script>
        hljs.highlightAll();
    </script>
    <title> {{ $title }}</title>
    <style>
        html,
        body {
            height: 100%;
            min-height: 100%;
            margin: 0;
            box-sizing: border-box;
            padding: 0;

        }

        .main-content {
            transition: all 0.3s ease-out !important;
            width: 100%
        }

        .toggle-main-content {
            padding-left: 250px;
        }

        .cursor-pointer {
            cursor: pointer;
        }

        .left-sidebar {
            width: 235px;
            position: fixed;
            top: 0;
            left: -235px;
            height: 100%;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
            padding-top: 90px;
            transition: all 0.3s ease-out;
            box-sizing: border-box;
        }

        .btn-toggle {
            display: inline-flex;
            align-items: center;
            padding: .25rem .5rem;
            font-weight: 600;
            border: 0;
        }

        .btn-toggle:hover,
        .btn-toggle:focus {
            color: rgba(0, 0, 0, .85);
            background-color: #d2f4ea;
        }

        .btn-toggle-nav a {
            display: inline-flex;
            padding: .1875rem .5rem;
            /*            margin-top: .125rem;*/
            /*            margin-left: 1.25rem;*/
            text-decoration: none;
        }

        .btn-toggle-nav a:hover,
        .btn-toggle-nav a:focus {
            background-color: #d2f4ea;
        }

        .sidebarshow {
            left: 0;
        }

        #TableOfContents ul,
        #TableOfContents ul li,
        #TableOfContents ul ul {
            list-style: none;
            margin: 0;
            padding: 0;
            padding-left: 0.5rem;
        }

        #TableOfContents ul li a {
            display: block;
            text-decoration: none;
            border-left: 0.3rem solid transparent;
            transition: border-left-color 0.3s ease;
            padding: .125rem 0 .125rem .75rem;
        }

        #TableOfContents ul li a:hover,
        #TableOfContents ul li a:active {
            border-left-color: #007bff;
        }

        #TableOfContents ul li a.active {
            border-left-color: #007bff;
        }

        .doc {
            overflow: auto;
            height: 90dvh;
        }

        .nav-doc {
            width: 20%;
            padding: 1rem;
            box-sizing: border-box;
        }

        .doc-main {
            width: 80%;
            scroll-behavior: smooth;
            box-sizing: border-box;
            padding: 1rem;
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

    <div class="modal fade" id="modals" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
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

    <script src="{{ asset('assets/bs/js/bootstrap.min.js')}}"></script>
    <script>
        const simpleToast = document.getElementById('simple-toast');
        const toastSimpleB = bootstrap.Toast.getOrCreateInstance(simpleToast)
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const myModalAlternative = new bootstrap.Modal('#modals', {
            keyboard: false
        });
        let resolveGlobal;
        let localTheme = localStorage.getItem("theme");


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
        const showSimpleToastInfo = (msg = 'nofitication') => {
            showSimpleToast(msg, 'info');
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
        const toggleDarkMode = () => {
            const current = document.documentElement.getAttribute('data-bs-theme');
            let finalTheme = current == 'dark' ? 'light' : 'dark';
            changeTheme(finalTheme);
        }

        const changeTheme = (theme) => {
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
            localStorage.setItem("theme", theme);

        }

        const genLinkDoc = () => {
            let ep = document.getElementById('endpoints');
            let classLink = localTheme === 'dark' ? 'link-light' : 'link-dark';
            console.log("el",localTheme);
            if (ep.innerHTML != ''){
                document.querySelectorAll('.endpoint').forEach((el)=>{
                    // console.log(el.id, el.innerText);
                    ep.innerHTML += `<li><a class="${classLink}" href="#${el.id}">${el.innerText}</a></li>`
                });
            }
        }


        // ============== Document Ready Function ================
        const errMsg = {!! json_encode($errors->all()) !!}


        if (errMsg.length > 0) {
            showSimpleToast(errMsg.join('<br>'));
        }
        if (localTheme) {
            const current = document.documentElement.getAttribute('data-bs-theme');
            if (localTheme !== current) {
                changeTheme(localTheme);
            }

        }


        // ============== Global Event Listener ================
        document.getElementById('modals').addEventListener('hide.bs.modal', modalsFunc);
        document.getElementById('btnConfirmYes').addEventListener('click', confirmationYes);
    </script>
    @stack('script')
    @stack('addEventListener')
</body>

</html>
