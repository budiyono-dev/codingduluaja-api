<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    public function index()
    {
        return view('page.admin.site');
    }
}
