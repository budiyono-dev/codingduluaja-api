<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\MenuParent;
use Illuminate\Support\Collection;

class SideBar extends Component
{
    public function __construct
    (
        public Collection $menu
    )
    {
        $this->menu = MenuParent::with('menuItem')->get();
        dd($this->menu);
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
