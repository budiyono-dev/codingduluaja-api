<?php

namespace App\View\Components;

use App\Services\MenuService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;
use Illuminate\View\Component;

class SideBar extends Component
{
    public function __construct(
        public Collection $menu,
        protected MenuService $menuService
    ) {
        $listMenu = Session::get('LIST_MENU'.auth()->user()->id);
        if (is_null($listMenu)) {
            $listMenu = $menuService->getEligibleMenu();
            Session::put('LIST_MENU'.auth()->user()->id, $listMenu);
//            $listPage = $listMenu->pluck('menuItem')->flatten()->pluck('page');
//            Session::put('LIST_MENU_PAGE'.auth()->user()->id, $listPage);
        }
        $this->menu = $listMenu;
    }

    public function render(): View|Closure|string
    {
        return view('components.side-bar');
    }

    public function hello(): string
    {
        return 'hello';
    }
}
