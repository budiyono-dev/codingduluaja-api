<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SideBar extends Component
{
    public array $menu;

    public function __construct()
    {
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
}
