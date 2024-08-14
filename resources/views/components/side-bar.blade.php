<div class="flex-shrink-0 p-3 left-sidebar" id="sidebar">
  <div class="border-bottom text-center pb-2 mx-auto">
    <span class="fs-5 fw-semibold">😎 Happy Coding 😎</span>
  </div>
  <ul class="list-unstyled ps-0">
    {{-- @foreach ($menu as $m)
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
    @endforeach --}}
    @foreach ($menu as $m)
    <li class="border-bottom">
      <button class="btn btn-toggle align-items-center collapsed btn-sm w-100"
        data-bs-toggle="collapse"
        data-bs-target="{{ '#' . $m->sequence }}"
        aria-expanded="false"
        type="button"> {{ __($m->name) }}</button>

        <div class="collapse" id="{{ $m->sequence }}">
          <ol class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            @foreach ($m->menuItem as $item)
            <li>
              <a href="{{ route($item->page, absolute:false) }}" class="nav-link w-100">
                {{ $item->sequence.'. '.__($item->name) }}
              </a>
            </li>
            @endforeach
          </ol>
        </div>
    </li>
    @endforeach
  </ul>
</div>
