<!-- @php
    use Illuminate\Support\Str;
@endphp

<div class="list-group">
  <a href="#" class="list-group-item list-group-item-action" aria-current="false" data-bs-toggle="collapse" data-bs-target="#sublink" aria-expanded="false" aria-controls="sublink">
    The current link item
  </a>
  <div class="list-group list-group-numbered collapse " id="sublink">
    <a href="#" class="list-group-item list-group-item-action">A second link item</a>
    <a href="#" class="list-group-item list-group-item-action">A third link item</a>
    <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
    <a href="#" class="list-group-item list-group-item-action disabled" tabindex="-1" aria-disabled="true">A disabled link item</a>
  </div>
</div>

<div class="list-group">
  @foreach($menu as $key => $menuItem)
    
    @php
      $id = Str::camel($menuItem['menuName'].$key);
    @endphp

    <a href="#" class="list-group-item list-group-item-action" aria-current="false" data-bs-toggle="collapse" data-bs-target="#{{ $id }}" aria-expanded="false" aria-controls="sublink" name="menu-parent" data-budi="hallo">
    <strong> {{ $menuItem['menuName']}} </strong>  
    </a>
    
    <div class="list-group list-group-numbered collapse " id="{{ $id }}">
      @foreach($menuItem['subMenu'] as $subMenu)
        <a href="#" class="list-group-item list-group-item-action" name="sub-menu">{{ $subMenu }}</a>
      @endforeach
    </div>

  @endforeach
  <script type="text/javascript">
    const menuParent = document.getElementsByName('menu-parent');
    const subMenu = document.getElementsByName('sub-menu');
    menuParent.forEach( el => {
      console.log(el.dataset.bsTarget)
      
    });
    // console.log(menuParent[0])
    // for (menu of menuParent) {
    //   // console.log(menu.children.length)
    //   // console.log(menu.childNodes.length)

    //     console.log('menu-parent di click');
    //   menu.addEventListener('click', (el) => {
    //     el.target.classList.toggle('active');

    //     // const sub = el.target.nextElementSibling;
    //     // console.log('SUBBBB', sub)
    //     // console.log(sub.childNodes)

    //     if (!el.target.classList.contains('show')) {
    //       // for (item of sub) {
    //       //   console.log("item ======= " ,item)
    //       //   item.target.classList.remove('active')    
    //       // }
    //     }
    //   });
    // }

    for (sub of subMenu) {
      sub.addEventListener('click', (el) => {
        console.log('menu-parent di click', el.target);
        el.target.classList.toggle('active');
      });
    }

    const hello = () => {
      console.lg('hallo')
    }
  </script>
</div> -->




<div class="flex-shrink-0 p-3 bg-white" style="width: 280px;">
    <ul class="list-unstyled ps-0">
      <li class="mb-1">
        <x-menu-item target="#orders-collapse2">
            Orders
        </x-menu-item>
        <x-side-bar.sub-menu-group id="orders-collapse2">
          <x-side-bar.sub-menu-item></x-side-bar.sub-menu-item>
        </x-side-bar.sub-menu-group>
      </li>
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
