<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('assets/css/lp.css') }}">
</head>

<body>
    <header>
        <div class="brand">
            Codingduluaja
        </div>

        <div class="nav">
            <nav>
                <ul>
                    <li><a href="#about">About</a></li>
                    <li><a href="#api">API</a></li>
                    <li><a href="#doc">Documentation</a></li>
                    <li><a href="#donate">Donate</a></li>
                    <li><a href="#faq">FAQ</a></li>
                </ul>
            </nav>
            <button id="toggleDark" type="button" class="dark-mode dark" >
                <x-icon.fa-sun></x-icon.fa-sun>
            </button>
            <button id="toggleLight" type="button" class="dark-mode dark" style="display: none">
                <x-icon.fa-sun-reg></x-icon.fa-sun-reg>
            </button>
        </div>

    </header>
    <main>
        <section id="about" class="page">
            <h2>Codingduluaja API</h2>
            <p>-- coding dulu aja pahamnya nanti --</p>
            <button type="button" class="btn-doc">
                Documentation
            </button>
        </section>
        <section id="api" class="page">
            api
        </section>
        <section id="doc" class="page">
            doc
        </section>
        <section id="faq" class="page">
            faq
        </section>
    </main>
    <footer>
        Footer
    </footer>
    <script>
        let lpTm = localStorage.getItem("lp-theme");
        function switchPallete(){
            const r = document.querySelector(':root');
            r.classList.toggle('dark');

        }
        function changeTheme(theme) {
            console.log('chane', theme);
            if (theme == 'dark') {
                document.getElementById('toggleDark').style.display = 'none';
                document.getElementById('toggleLight').style.display = 'block';
            } else {
                document.getElementById('toggleDark').style.display = 'block';
                document.getElementById('toggleLight').style.display = 'none';
            }
            localStorage.setItem('lp-theme', theme);
            switchPallete();
        }

        if (lpTm) {
            const r = document.querySelector(':root');
            const current = r.classList.contains('darl') ? 'dark' : 'light';
            if (current != lpTm) { 
                changeTheme(lpTm)
            }
        }
        document.getElementById('toggleDark').addEventListener('click', () => changeTheme('dark'));
        document.getElementById('toggleLight').addEventListener('click', () => changeTheme('light'));
    </script>
</body>

</html>
