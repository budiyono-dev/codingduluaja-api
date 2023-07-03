@push('styles')
    <style>
        .left-sidebar {
            background: #fff;
            width: 235px;
            position: fixed;
            top: 0;
            left: -235px;
            height: 100%;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
            padding-top: 90px;
            transition: all 0.3s ease-out;
        }

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

        .sidebarshow {
            left: 0;
        }
    </style>
@endpush

<div class="flex-shrink-0 p-3 bg-white left-sidebar" style="//width: 280px;" id="sidebar">
  <div class="border-bottom text-center pb-2 mx-auto">
    <!-- <svg class="bi me-2" width="30" height="24"><use xlink:href="#bootstrap"/></svg> -->
    <span class="fs-5 fw-semibold">Codingduluaja</span>
  </div>
  <ul class="list-unstyled ps-0">
      @foreach ($menu as $m)
          <x-sidebar.menu-group>
              <x-sidebar.menu-item target="{{ '#' . $toCamel($m['menuName']) }}" menuName="{{ $m['menuName'] }}" />
              <x-sidebar.sub-menu-group id="{{ $toCamel($m['menuName']) }}">
                  @foreach ($m['subMenu'] as $i => $item)
                      <x-sidebar.sub-menu-item subMenuName="{{ ($i+1).'. '.$item }}" />
                  @endforeach
              </x-sidebar.sub-menu-group>
          </x-sidebar.menu-group>
      @endforeach
  </ul>
</div>

@push('script')
    <script type="text/javascript">
        const toggleSidebar = () => {
            console.log('toggle')
            document.getElementById('sidebar').classList.toggle('sidebarshow');
            document.getElementById('main').classList.toggle('toggle-main-content');
        }
    </script>
@endpush
@push('addEventListener')
    <script type="text/javascript">
        document.getElementById('btn-toggle-sidebar').addEventListener('click', toggleSidebar);
    </script>
@endpush
