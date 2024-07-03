<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ToolsController extends Controller
{
    public function base64(Request $request)
    {
        return view('page.tool.base64');
    }
}
