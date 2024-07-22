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
  <div class="text-center position-relative mt-3">
    <span class="fs-6">Version {{config('app.app_version')}}</span>
  </div>
</div>
