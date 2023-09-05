<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateAppClientRequest;
use App\Models\AppClient;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class AppClientController extends Controller
{
    public function index(): View
    {
        // craete token for user with expired
        $user = Auth::user();
        $userId = $user->id;

        $listAppClient = AppClient::where('user_id', $userId)->get();

        // dd($listAppClient);

        return view('page.app-client', ['listAppClient'=> $listAppClient]);
    }
    public function createApp(CreateAppClientRequest $req)
    {
        dd($req);
    }
}
