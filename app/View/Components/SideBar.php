<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\MenuParent;
use App\Services\MenuService;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;

class SideBar extends Component
{
    public function __construct
    (
        public Collection $menu,
        protected MenuService $menuService
    )
    {
        $listMenu = Session::get('LIST_MENU');
        if(is_null($listMenu)){
            $listMenu = $menuService->getEligibleMenu();
            Session::put('LIST_MENU', $listMenu);
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
