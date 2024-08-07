<?php

namespace App\Dto;

use Illuminate\Support\Collection;

class MenuParentDto
{
    public string $name;

    public int $sequence;

    public Collection $menuItem;

    public function __construct()
    {
        $this->menuItem = collect([]);
    }
}
