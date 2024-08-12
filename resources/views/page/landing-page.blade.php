<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
    <meta name="description" content="Open Api untuk belajar font-end development tanpa perlu pusing mikirin backend" />
    <title>Codingduluaja</title>
    <link rel="stylesheet" href="{{ asset('assets/css/lp.css') }}">
</head>

<body>
    <header>
        <div class="brand">
            Codingduluaja
        </div>
        <div class="nav">
            @if(false)
            <nav>
                <ul>
                    <li><a href="#about">About</a></li>
                    <li><a href="#api">API</a></li>
                    <li><a href="#tools">Tools</a></li>
                    <li><a href="#donate">Donate</a></li>
                    <li><a href="{{ route('login') }}">Login</a></li>
                    {{-- <li><a href="#faq">FAQ</a></li> --}}
                </ul>
            </nav>
            @endif
        </div>
    </header>
    <main>
        <div class="about">
            <h2>Codingduluaja API</h2>
            <p>-- coding dulu aja pahamnya nanti --</p>
            <button type="button" class="btn-doc">
                Documentation
            </button>
        </div>
        <div class="content">
            <div>
                <ul>
                    <li><a href="">Todolist</a></li>
                    <li><a href="">Wilayah BPS</a></li>
                    <li><a href="">Wilayah Dagri</a></li>
                    <li><a href="">User Api</a></li>
                </ul>
            </div>
            <div>
                <h2>Donate and Support Us</h2>
                <div>
                    <div class="card">
                        <h3 class="title">Saweria</h3>
                        <p>support codingduluaja api on saweria <a href="https://saweria.co/codingduluaja">https://saweria.co/codingduluaja</a></p>
                    </div>
                </div>
            </div>
        </div>
        {{-- <section id="about" class="page">
            <h2>Codingduluaja API</h2>
            <p>-- coding dulu aja pahamnya nanti --</p>
            <button type="button" class="btn-doc">
                Documentation
            </button>
        </section>
        <section id="api" class="page">
            <h2>Our API</h2>
            <div class="card">
                <h3 class="title">Todolist</h3>
                <p>Api sederhana untuk membuat aplikasi todolist</p>
            </div>
            <div class="card">
                <h3 class="title">Wilayah BPS</h3>
                <p>Api wilayah indonesia berdasarkan BPS</p>
            </div>
            <div class="card">
                <h3 class="title">Wilayah DAGRI</h3>
                <p>Api wilayah indonesia berdasarkan KEMENDAGRI</p>
            </div>
            <div class="card">
                <h3 class="title">User API</h3>
                <p>Api user</p>
            </div>
        </section>
        <section id="tools" class="page">
            <h2>Tools</h2>
            <div class="card">
                <h3 class="title">Base64 Tools</h3>
                <p>Covert string ke base64 dan sebaliknya</p>
            </div>
        </section>
        <section id="donate" class="page">
            <h2>Donate and Support Us</h2>
            <div>
                <div class="card">
                    <h3 class="title">Saweria</h3>
                    <p>support codingduluaja api on saweria <a href="https://saweria.co/codingduluaja">https://saweria.co/codingduluaja</a></p>
                </div>
            </div>           
        </section> --}}
        {{-- <section id="faq" class="page">
            <h2>Frequently Asked Questions (FAQ)</h2>
            faq
        </section> --}}
    </main>
    <footer>
        <p>
            Codingduluaja API. Copyright &copy 2024. Version : {{ config('app.app_version') }}
        </p>
    </footer>
</body>
</html>
