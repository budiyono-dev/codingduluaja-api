<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocController extends Controller
{
    public function todolist()
    {
        return view('page.doc.todolist', ['endpoint' => config('app.url')]);
    }
    public function wilayahBps()
    {
        return view('page.doc.todolist', ['endpoint' => config('app.url')]);
    }
    public function wilayahDagri()
    {
        return view('page.doc.todolist', ['endpoint' => config('app.url')]);
    }
}
