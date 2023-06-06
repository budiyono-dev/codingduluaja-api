<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="{{asset('assets/bootstrap.min.css')}}">
    <style>
        $accordion-padding-y: 0rem;
    </style>
  </head>
  <body>
    <input id="btnClick" type="button" value="klik disini" >
    <h1>Hello, world!</h1>
    <div class="accordion accordion-flush" id="accordionExample">
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
            Menu 1
            </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
            Submenu 1
            </div>
        </div>
    </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingTwo">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Menu 2
          </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            submenu 2
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingThree">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            Menu 3
          </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <strong> submenu 3</strong>
          </div>
        </div>
      </div>
    </div>
<input id="hasil" type="text" name="hasil">
<script src="{{asset('assets/bootstrap.bundle.min.js')}}"></script>
    <script >
        const buttonClick = document.getElementById('btnClick');
        console.log(buttonClick);
        buttonClick.addEventListener('click',() => {
            console.log('even triger')
                fetch('/home')
                .then( data => {
                        console.log('fetching data') 
                        console.log(data)
                    })
                .catch( e => e.getMessage)
                    
                    
        });

    </script>
</body>
</html>
