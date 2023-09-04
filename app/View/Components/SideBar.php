<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Traits\Component\ToCamel;
use App\Models\MenuParent;
use App\Models\MenuItem;

class SideBar extends Component
{
    use ToCamel;

    public array $menu;

    public function __construct()
    {
        $menuParent = MenuParent::with('menuItem')->get();
        $menuCollection = collect();
        // dd($menuParent->toArray());
        $menu = $menuParent->map(function(MenuParent $parent) {
            $menuItem = $parent->menuItem->map(function(MenuItem $mitem) {
                return [
                    'seq' => $mitem->sequence,
                    'name'=> $mitem->name,
                    'page'=> $mitem->page
                ];
            })->toArray();

            return [
                'seq' => $parent->sequence,
                'menuName' => $parent->name,
                'subMenu' => $menuItem
            ];
        })->toArray();
        $this->menu = $menu; 
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
