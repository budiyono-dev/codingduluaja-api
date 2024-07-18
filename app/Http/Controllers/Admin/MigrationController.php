<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class MigrationController extends Controller
{
    public function index()
    {
        return view('page.admin.migration');
    }
}
