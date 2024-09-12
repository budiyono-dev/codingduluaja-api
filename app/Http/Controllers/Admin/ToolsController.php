<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ToolsController extends Controller
{
    public function base64(Request $request)
    {
        return view('page.tool.base64');
    }
}
