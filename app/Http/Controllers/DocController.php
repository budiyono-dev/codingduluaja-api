<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocController extends Controller
{
    public function todolist()
    {
        return view('page.doc.todolist');
    }
}
