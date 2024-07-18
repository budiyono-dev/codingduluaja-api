<?php

namespace App\Services;

use Illuminate\Http\Request;

interface MenuService
{
    public function getEligibleMenu();

    public function isUserEligible(Request $req);

    public function getActiveMenu();
}
