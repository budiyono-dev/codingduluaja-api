<?php

namespace App\Http\Controllers\Feedback;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        return view('page.fb.saran');
    }

    public function post(Request $req)
    {

        dd($req->all());

        return redirect()->route('feedback.report');
    }
}
