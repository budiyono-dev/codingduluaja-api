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
  Add Resource
  
  <button type="button" class="btn btn-primary btn-lg" id="btnCreateToken">
    Create Token
  </button>

@push('script')
<script>
// <form action="{{ route('do.createToken') }}">
const createToken = async (el) => {
try {
    const res = await fetch("{{ route('do.createToken') }}");
    console.log(res);
} catch (e) {
    log.error('error', e);
}
    console.log(el);
    console.log(el.target);
}


</script>
@endpush
@push('addEventListener')
    <script type="text/javascript">
        document.getElementById('btnCreateToken').addEventListener('click', createToken);
    </script>
@endpush
</x-layout.main-sidebar>


