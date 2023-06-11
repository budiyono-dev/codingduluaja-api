<div class="flex-shrink-0 p-3 bg-white" style="width: 280px;">
  <ul class="list-unstyled ps-0">
    @foreach ($menu as $m)
      <x-side-bar.menu-group>
        <x-menu-item target="#orders-collapse2">
          {{ $m['menuName'] }}
        </x-menu-item>
        <x-side-bar.sub-menu-group id="orders-collapse2">
          <x-side-bar.sub-menu-item :items="$m['subMenu']"/>
        </x-side-bar.sub-menu-group>
      </x-side-bar.menu-group>
    @endforeach
  </ul>
</div>


@push('styles')
  <style type="text/css">
    .btn-toggle {
      display: inline-flex;
      align-items: center;
      padding: .25rem .5rem;
      font-weight: 600;
      color: rgba(0, 0, 0, .65);
      background-color: transparent;
      border: 0;
    }
    .btn-toggle:hover,
    .btn-toggle:focus {
      color: rgba(0, 0, 0, .85);
      background-color: #d2f4ea;
    }

    .btn-toggle::before {
      width: 1.25em;
      line-height: 0;
      content: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='rgba%280,0,0,.5%29' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M5 14l6-6-6-6'/%3e%3c/svg%3e");
      transition: transform .35s ease;
      transform-origin: .5em 50%;
    }

    .btn-toggle[aria-expanded="true"] {
      color: rgba(0, 0, 0, .85);
    }
    .btn-toggle[aria-expanded="true"]::before {
      transform: rotate(90deg);
    }

    .btn-toggle-nav a {
      display: inline-flex;
      padding: .1875rem .5rem;
      margin-top: .125rem;
      margin-left: 1.25rem;
      text-decoration: none;
    }
    .btn-toggle-nav a:hover,
    .btn-toggle-nav a:focus {
      background-color: #d2f4ea;
    }
  </style>  
@endpush
