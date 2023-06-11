<x-layout>
    <!-- <div class="container"> -->
      <div class="row">
        <div class="col text-center border border-dark">
          <!-- <input type="button" name="hide-sidebar" data-bs-toggle="collapse" data-bs-target="#sidebar" 
          aria-expanded="false" aria-controls="collapseElement" value="toggle bar"> -->
          <x-nav-bar />         
        </div>
      </div>
      <div class="row">
        <!-- <div class="col bg-primary collapse collapse-left" id="sidebar"> -->
        <div class="col">
          <x-side-bar />
        </div>
        <div class="col">
          column 2
        </div>
        <div class="col">
          column 3
        </div>
      </div>
    <!-- </div> -->
</x-layout>
