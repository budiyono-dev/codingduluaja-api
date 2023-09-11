<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class AppResourceController extends Controller
{
    public function index(): View
    {
        $listRersource = null;
        $masterResource = null;
        return view('page.app-resource', ['listResource' => $listRersource, 'masterResource' => $masterResource]);
    }
}
