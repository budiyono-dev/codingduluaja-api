<x-layout.main-sidebar title="Home">
    <x-side-bar />

  <div id="main" class="main-content">
    <div class="row">
      <div class="col text-center border border-dark">
        <x-nav-bar />
      </div>
    </div>
    <div class="row">
      <div class="col text-center">
        column 2
      </div>
    </div>
  </div>

@push('styles')
  <style>
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

</x-layout.main-sidebar>


