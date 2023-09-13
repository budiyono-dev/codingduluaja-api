<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use App\Models\MasterResource;

class AppResourceController extends Controller
{
    public function index(): View
    {

        $listRersource = null;
        $masterResource = MasterResource::all();
        return view('page.app-resource', ['listResource' => $listRersource, 'masterResource' => $masterResource]);
    }
}
