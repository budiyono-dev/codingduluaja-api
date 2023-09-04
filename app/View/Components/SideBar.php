<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Traits\Component\ToCamel;
use App\Models\MenuParent;

class SideBar extends Component
{
    use ToCamel;

    public array $menu;

    public function __construct()
    {
        $menuParent = MenuParent::with('menuItem')->get();
        $menuCollection = collect();
        // dd($menuParent->toArray());
        $menuParent->map();
        foreach ($menuParent as $parent) {
            dd($parent->menuItem);
        }
        $this->menu = array(
             [ 
                'menuName' => 'Menu Pertama',
                'subMenu' => [
                    'Sub Menu Pertama',
                    'Sub Menu Kedua',
                    'Sub Menu Ketiga'
                ]

            ],
            [ 
                'menuName' => 'Menu Kedua',
                'subMenu' => [
                    'Sub Menu Pertama',
                    'Sub Menu Kedua',
                    'Sub Menu Ketiga'
                ]

            ], 
        );
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.side-bar');
    }

    public function hello(): string
    {
        return 'hello';
    }
}
