<?php

namespace App\View\Components\Layout;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MainSidebar extends Component
{
    public function __construct
    (
        public string $title = 'default'
    )
    {
        //
    }

    public function render(): View|Closure|string
    {
        return view('components.layout.main-sidebar');
    }
}
