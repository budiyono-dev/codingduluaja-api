<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateAppClientRequest;

class AppClientController extends Controller
{
    public function createApp(CreateAppClientRequest $req)
    {
        dd($req);
    }
}
