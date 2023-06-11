<?php

namespace App\View\Components\side-bar;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Str;

class SubMenuItem extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.side-bar.sub-menu-item');
    }

    public function toCamel(string $meniItem, string $key): string
    {
        return Str::camel($menuItem['menuName'].$key);
    }
}
