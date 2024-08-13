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
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
</head>

<body>
    <main>
    <div class="new-card">
        <span id="element"></span>
        <div class="option"> 
            <a href="#" class="link">> Gabung Sini</a>
            <a href="#" class="link">> How-to Codingduluaja</a>
        </div>
        <p class="footer">
        Codingduluaja API. Copyright &copy 2024. Version : {{ config('app.app_version') }}
        </p>
    </div>
</main>
<script>
var typed = new Typed('#element', {
      strings: ['Belajar Frontend tapi Males Bikin API?'],
      typeSpeed: 50,
    });
</script>
</body>
</html>
