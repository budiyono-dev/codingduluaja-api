@push('styles')
    <style>
        .left-sidebar {
            width: 235px;
            position: fixed;
            top: 0;
            left: -235px;
            height: 100%;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
            padding-top: 90px;
            transition: all 0.3s ease-out;
            box-sizing: border-box;
        }

        .btn-toggle {
            display: inline-flex;
            align-items: center;
            padding: .25rem .5rem;
            font-weight: 600;
            border: 0;
        }

        .btn-toggle:hover,
        .btn-toggle:focus {
            color: rgba(0, 0, 0, .85);
            background-color: #d2f4ea;
        }

        .btn-toggle-nav a {
            display: inline-flex;
            padding: .1875rem .5rem;
/*            margin-top: .125rem;*/
/*            margin-left: 1.25rem;*/
            text-decoration: none;
        }

        .btn-toggle-nav a:hover,
        .btn-toggle-nav a:focus {
            background-color: #d2f4ea;
        }

        .sidebarshow {
            left: 0;
        }
    </style>
@endpush

<div class="flex-shrink-0 p-3 left-sidebar" id="sidebar">
  <div class="border-bottom text-center pb-2 mx-auto">
    <span class="fs-5 fw-semibold">😎 Happy Coding 😎</span>
  </div>
  <ul class="list-unstyled ps-0">
      @foreach ($menu as $m)
          <x-sidebar.menu-group>
              <x-sidebar.menu-item target="{{ '#' . $m->sequence }}" menuName="{{ __($m->name) }}" />
              <x-sidebar.sub-menu-group id="{{ $m->sequence }}">
                  @foreach ($m->menuItem as $item)
                      <x-sidebar.sub-menu-item
                        subMenuName="{{ $item->sequence.'. '.__($item->name) }}"
                        href="{{ route($item->page) }}"
                      />
                  @endforeach
              </x-sidebar.sub-menu-group>
          </x-sidebar.menu-group>
    @endforeach
  </ul>
</div>
