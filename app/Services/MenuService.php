<?php

namespace App\Services;

use Illuminate\Http\Request;

interface MenuService
{
    function getEligibleMenu();
    function isUserEligible(Request $req);
}
