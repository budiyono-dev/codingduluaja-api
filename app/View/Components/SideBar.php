<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SideBar extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $menu = array(
            'Menu Pertama' => [
                'Sub Menu Pertama',
                'Sub Menu Kedua',
                'Sub Menu Ketiga'

            ],
            'Menu Kedua' => [
                'Sub Menu Pertama',
                'Sub Menu Kedua',
                'Sub Menu Ketiga'

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
