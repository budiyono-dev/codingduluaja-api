<x-layout>
  <x-side-bar />
  <div id="main" class="main-content">
    <div class="row">
      {{-- <x-sidebar.button-sidebar/> --}}
      <div class="col text-center border border-dark">
        <!-- <input type="button" name="hide-sidebar" data-bs-toggle="collapse" data-bs-target="#sidebar" 
        aria-expanded="false" aria-controls="collapseElement" value="toggle bar"> -->
        <x-nav-bar />         
      </div>
    </div>
    <div class="row">
      <!-- <div class="col bg-primary collapse collapse-left" id="sidebar"> -->
      <div class="col">
        
      </div>
      <div class="col">
        column 2
      </div>
      <div class="col">
        column 3
      </div>
    </div>
  </div>
@push('styles')
  <style type="text/css">
    .main-content {
      /* margin-left: 250px; */
      transition: all 0.3s ease-out;
      /* padding: 20px; */
    }
    .toggle-main-content {
      margin-left: 250px
    }
  </style>  
@endpush
</x-layout>


