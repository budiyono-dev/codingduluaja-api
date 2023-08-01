<x-layout.main-sidebar title="Home">
  {{-- <div id="main" class="main-content">
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
  </div> --}}
<form action="{{ route('do.createToken') }}">
  <button type="submit">
    Create Token
  </button>
</form>


</x-layout.main-sidebar>


